<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlotMergeRequest;
use App\Http\Requests\StorePlotRequest;
use App\Http\Requests\StorePlotSplitRequest;
use App\Http\Requests\UpdatePlotRequest;
use App\Models\PlotLog;
use App\Models\SpecialEconomicZone;
use App\Models\Plot;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
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
            $query=Plot::with('specialEconomicZone')->when(!auth()->user()->hasAnyRole('Super Admin','Admin'), function ($q){
                return $q->where('special_economic_zone_id', auth()->user()->special_economic_zone_id);
            });

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('specialEconomicZone', function (Plot $plot) {
                    return optional($plot->specialEconomicZone)->name;
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
                    $actionBtn ='<a href="'.route('plots.edit',$plot).'" class="btn btn-icon btn-outline-success btn-circle btn-sm mr-2" title="Update"> <i class="flaticon2-edit"></i> </a>';
                    $actionBtn .='<a onclick="activate_inactive(this); return false;" href="'.route('plots.destroy',$plot).'" class="btn btn-icon btn-circle btn-sm mr-2 '.($plot->status?'btn-outline-success':'btn-outline-danger').'" title="'.($plot->status?'Deactivate':'Activate').'"> <i class="'.($plot->status?'icon-xl fas fa-toggle-on':'icon-xl fas fa-toggle-off').'"></i> </a>';
                    $actionBtn .='<a href="'.route('plots.split.create',$plot).'" class="btn btn-icon btn-outline-success btn-circle btn-sm mr-2" title="Plot Split"> <i class="fas fa-columns"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['specialEconomicZone','plot_no','status','action'])
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

    public function split(Plot $plot){
        return view('plots.split', compact('plot'));
    }

    public function splitStore(StorePlotSplitRequest $request, Plot $plot){

        $total_area = 0;
        foreach ($request->new_plots as $new_plot){
            $newPlot = $plot->replicate();
            $newPlot->plot_no = $new_plot['plot_no'];
            $newPlot->plot_size = $new_plot['plot_size'];
            $newPlot->plot_action = null;
            $newPlot->latitude = $new_plot['latitude'];
            $newPlot->longitude = $new_plot['longitude'];
            $newPlot->save();

            $total_area +=  $newPlot->plot_size;

            PlotLog::create([
                'plot_id' =>   $plot->id,
                'new_plot_id' =>  $newPlot->id,
                'plot_action' =>   'Split',
            ]);
        }

        $plot->update([
            'plot_size'=> $plot->plot_size - $total_area,
            'plot_action'=> 'Split'
        ]);



        return redirect()
            ->route('plots.index')
            ->with('success_message', 'Plot has been split successfully.');

    }

    public function merge(){
        $data = array();
        $data['specialEconomicZones'] =SpecialEconomicZone::where('status', 1)->get();
        return view('plots.merge', compact('data'));
    }

    public function mergeStore(StorePlotMergeRequest $request)
    {
        $data = $request->validated();
        $data['plot_size'] = $this->mergePlotsArea($request);
        $newPlot = Plot::create($data);

        foreach ($request->merge_plots as $id) {
            $plot = Plot::find($id);
            if($plot) {
                PlotLog::create([
                    'plot_id' => $plot->id,
                    'new_plot_id' => $newPlot->id,
                    'plot_action' => 'Merge',
                ]);
                $plot->update(['deleted_at'=> now(), 'plot_action'=> 'Merge']);
            }
        }

        return redirect()
            ->route('plots.index')
            ->with('success_message', 'Plot has been merge successfully.');

    }

    public function zonePlots(Request $request){
         $query = Plot::where('special_economic_zone_id', $request->special_economic_zone_id)->where('plot_type',$request->plot_type);
         if(isset($request->plot_status) && !empty($request->plot_status)){
             $query->where('plot_status', $request->plot_status);
         }
         $plots= $query->get();
        return response()->json($plots);
    }

    public function mergePlotsArea(Request $request){
        $total_area = 0;
        if(isset($request->merge_plots) && !empty($request->merge_plots)) {
            $total_area= Plot::whereIn('id', $request->merge_plots)->sum('plot_size');
        }
        return $total_area;
    }
}
