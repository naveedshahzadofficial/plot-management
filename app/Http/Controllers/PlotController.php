<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlotRequest;
use App\Http\Requests\UpdatePlotRequest;
use App\Models\SpecialEconomicZone;
use App\Models\Plot;
use Illuminate\Contracts\Foundation\Application;
use Yajra\DataTables\DataTables;

class PlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $query=Plot::with('specialEconomicZone');
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('special_economic_zone', function (Plot $plot) {
                    return optional($plot->specialEconomicZone)->name;
                })
                ->editColumn('plot_no', function (Plot $plot) {
                    return number_format($plot->plot_no);
                })
                ->editColumn('status', function (Plot $plot) {
                    return '<span class="label label-lg font-weight-bold label-inline '.($plot->status?'label-light-success':'label-light-danger').'">'.($plot->status?'Active':'Inactive').'</span>';
                })
                ->filterColumn('status', function($query, $keyword) {
                    $status_id = strtolower($keyword) === 'active'?'1':(strtolower($keyword) === 'inactive'?'0':'-1');
                    if($status_id != '-1')
                        $query->where('status', $status_id);
                })
                ->addColumn('action', function(Plot $plot){
                    $actionBtn ='<a href="'.route('plots.edit',$plot).'" class="btn btn-icon btn-outline-success btn-circle btn-xs mr-2" title="Update"> <i class="flaticon2-edit"></i> </a>';
                    $actionBtn .='<a onclick="activate_inactive(this); return false;" href="'.route('plots.destroy',$plot).'" class="btn btn-icon btn-circle btn-xs mr-2 '.($plot->status?'btn-outline-success':'btn-outline-danger').'" title="'.($plot->status?'Activate':'Deactivate').'"> <i class="'.($plot->status?'icon-xl fas fa-toggle-on':'icon-xl fas fa-toggle-off').'"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['special_economic_zone','plot_no','status','action'])
                ->make(true);
        }

        return view('plots.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialEconomicZones =SpecialEconomicZone::where('status', 1)->get();
        return view('plots.create',compact('specialEconomicZones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlotRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePlotRequest $request)
    {
        Plot::create($request->validated());
        return redirect()
            ->route('plots.index')
            ->with('success_message', 'Plot has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function show(Plot $plot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plot  $plot
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Plot $plot)
    {
        $specialEconomicZones =SpecialEconomicZone::where('status', 1)->get();
        return view('plots.edit',compact('specialEconomicZones', 'plot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlotRequest  $request
     * @param  \App\Models\Plot  $plot
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePlotRequest $request, Plot $plot)
    {
        $plot->update($request->validated());
        return redirect()
            ->route('plots.index')
            ->with('success_message', 'Plot has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plot  $plot
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Plot $plot)
    {
        $plot->update(['status'=>!$plot->status]);
        return redirect()
            ->route('plots.index')
            ->with('success_message', 'Plot status has been changed successfully.');
    }
}
