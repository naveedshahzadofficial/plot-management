<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAllotmentRequest;
use App\Models\Allotment;
use App\Models\Plot;
use App\Models\PlotAllotment;
use App\Models\Sector;
use App\Models\SpecialEconomicZone;
use Yajra\DataTables\DataTables;

class AllotmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\PlotAllotment  $plotAllotment
     * @return \Illuminate\Http\Response
     */
    public function index(PlotAllotment $plotAllotment)
    {
        if(request()->ajax()) {
            $query=Allotment::with('sector')->where('plot_allotment_id', $plotAllotment->id);
            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('sector', function (Allotment $allotment) {
                    return optional($allotment->sector)->name;
                })
                ->editColumn('status', function (Allotment $allotment) {
                    return '<span class="label label-lg font-weight-bold label-inline '.($allotment->status?'label-light-success':'label-light-danger').'">'.($allotment->status?'Active':'Inactive').'</span>';
                })
                ->filterColumn('status', function($query, $keyword) {
                    $status_id = strtolower($keyword) === 'active'?'1':(strtolower($keyword) === 'inactive'?'0':'-1');
                    if($status_id != '-1')
                        $query->where('status', $status_id);
                })
                ->addColumn('action', function(Allotment $allotment) use ($plotAllotment) {
                    $actionBtn ='<a href="'.route('plot-allotments.allotments.edit',[$plotAllotment, $allotment]).'" class="btn btn-icon btn-outline-success btn-circle btn-sm mr-2" title="Update"> <i class="flaticon2-edit"></i> </a>';
                    $actionBtn .='<a onclick="activate_inactive(this); return false;" href="'.route('plot-allotments.allotments.destroy',[$plotAllotment, $allotment]).'" class="btn btn-icon btn-circle btn-sm mr-2 '.($allotment->status?'btn-outline-success':'btn-outline-danger').'" title="'.($allotment->status?'Deactivate':'Activate').'"> <i class="'.($allotment->status?'icon-xl fas fa-toggle-on':'icon-xl fas fa-toggle-off').'"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['sector','status','action'])
                ->make(true);
        }

        $sectors = Sector::where('status', 1)->get();
        $specialEconomicZones = SpecialEconomicZone::where('status', 1)->get();
        $plots = Collect();
        return view('allotments.index', compact('plotAllotment', 'sectors','specialEconomicZones', 'plots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\PlotAllotment  $plotAllotment
     * @return \Illuminate\Http\Response
     */
    public function create(PlotAllotment $plotAllotment)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlotAllotment  $plotAllotment
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAllotmentRequest $request, PlotAllotment $plotAllotment)
    {
        $data = $request->validated();
        $plotAllotment->allotments()->create($data);
        if(isset($data['plot_allocations']) && !empty($data['plot_allocations'])) {
            $plot_allocation = $plotAllotment->allotments->first();
            $plot_allocation->plotAllocations()->createMany($data['plot_allocations']);
        }
        return redirect()
            ->route('plot-allotments.allotments.index', $plotAllotment)
            ->with('success_message', 'Allotment has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlotAllotment  $plotAllotment
     * @param  \App\Models\Allotment  $allotment
     * @return \Illuminate\Http\Response
     */
    public function show(PlotAllotment $plotAllotment, Allotment $allotment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotAllotment  $plotAllotment
     * @param  \App\Models\Allotment  $allotment
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotAllotment $plotAllotment, Allotment $allotment)
    {
        $sectors = Sector::where('status', 1)->get();
        return view('allotments.index', compact('plotAllotment', 'allotment', 'sectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlotAllotment  $plotAllotment
     * @param  \App\Models\Allotment  $allotment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreAllotmentRequest $request, PlotAllotment $plotAllotment, Allotment $allotment)
    {
        $allotment->update($request->validated());
        return redirect()
            ->route('plot-allotments.allotments.index', $plotAllotment)
            ->with('success_message', 'Allotment has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotAllotment  $plotAllotment
     * @param  \App\Models\Allotment  $allotment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PlotAllotment $plotAllotment, Allotment $allotment)
    {
        $allotment->update(['status'=>!$allotment->status]);
        return redirect()
            ->route('plot-allotments.allotments.index',$plotAllotment)
            ->with('success_message', 'Allotment status has been changed successfully.');
    }
}
