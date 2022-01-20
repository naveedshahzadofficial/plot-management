<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlotAllotmentRequest;
use App\Http\Requests\UpdatePlotAllotmentRequest;
use App\Models\BusinessStructure;
use App\Models\District;
use App\Models\PlotAllotment;
use App\Models\Province;
use App\Models\Question;
use App\Models\SpecialEconomicZone;
use App\Models\Tehsil;
use Yajra\DataTables\DataTables;

class PlotAllotmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {

            $query=PlotAllotment::with('specialEconomicZone')->when(!auth()->user()->hasAnyRole('Super Admin','Admin'), function ($q){
                return $q->where('special_economic_zone_id', auth()->user()->special_economic_zone_id);
            });

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('specialEconomicZone', function (PlotAllotment $plotAllotment) {
                    return optional($plotAllotment->specialEconomicZone)->name;
                })
                ->editColumn('name', function (PlotAllotment $plotAllotment) {
                    return $plotAllotment->owner_question_id==1 ? $plotAllotment->business_name : $plotAllotment->full_name;
                })
                ->orderColumn('name', function ($query, $order) {
                    $query->orderBy('business_name', $order);
                    $query->orderBy('full_name', $order);
                })
                ->filterColumn('name', function($query, $keyword) {
                    $query->where('business_name', 'LIKE', "%{$keyword}%")
                        ->orWhere('full_name', 'LIKE', "%{$keyword}%");
                })
                ->editColumn('status', function (PlotAllotment $plotAllotment) {
                    return '<span class="label label-lg font-weight-bold label-inline '.($plotAllotment->status?'label-light-success':'label-light-danger').'">'.($plotAllotment->status?'Active':'Inactive').'</span>';
                })
                ->filterColumn('status', function($query, $keyword) {
                    $status_id = strtolower($keyword) === 'active'?'1':(strtolower($keyword) === 'inactive'?'0':'-1');
                    if($status_id != '-1')
                        $query->where('status', $status_id);
                })
                ->addColumn('action', function(PlotAllotment $plotAllotment){
                    $actionBtn ='<a href="'.route('plot-allotments.edit',$plotAllotment).'" class="btn btn-icon btn-outline-success btn-circle btn-xs mr-2" title="Update"> <i class="flaticon2-edit"></i> </a>';
                    $actionBtn .='<a onclick="activate_inactive(this); return false;" href="'.route('plot-allotments.destroy',$plotAllotment).'" class="btn btn-icon btn-circle btn-xs mr-2 '.($plotAllotment->status?'btn-outline-success':'btn-outline-danger').'" title="'.($plotAllotment->status?'Deactivate':'Activate').'"> <i class="'.($plotAllotment->status?'icon-xl fas fa-toggle-on':'icon-xl fas fa-toggle-off').'"></i> </a>';
                    $actionBtn .='<a href="'.route('plot-allotments.allotments.index',$plotAllotment).'" class="btn btn-icon btn-outline-success btn-circle btn-xs mr-2" title="Allotment"> <i class="fa fa-building"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['specialEconomicZone','name','status','action'])
                ->make(true);

        }
        return view('plot-allotments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialEconomicZones =SpecialEconomicZone::where('status', 1)->get();
        $questions = Question::where('status', 1)->get();
        $businessStructures = BusinessStructure::where('structure_status', 1)->get();
        $provinces = Province::where('province_status', 1)->get();
        $districts = District::where('district_status', 1)->get();
        $tehsils = Tehsil::where('tehsil_status', 1)->get();
        return view('plot-allotments.create',compact('specialEconomicZones', 'questions', 'businessStructures', 'provinces', 'districts', 'tehsils'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlotAllotmentRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePlotAllotmentRequest $request)
    {
        $data = $request->validated();
        $plotAllotment = PlotAllotment::create($data);

        if(isset($data['addresses']) && !empty($data['addresses']))
        $plotAllotment->addresses()->createMany($data['addresses']);

        return redirect()
            ->route('plot-allotments.index')
            ->with('success_message', 'Plot Allotment Profile has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlotAllotment  $plotAllotment
     * @return \Illuminate\Http\Response
     */
    public function show(PlotAllotment $plotAllotment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotAllotment  $plotAllotment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(PlotAllotment $plotAllotment)
    {
        $plotAllotment->load('addresses');
        $specialEconomicZones = SpecialEconomicZone::where('status', 1)->get();
        $questions = Question::where('status', 1)->get();
        $businessStructures = BusinessStructure::where('structure_status', 1)->get();
        $provinces = Province::where('province_status', 1)->get();
        $districts = District::where('district_status', 1)->get();
        $tehsils = Tehsil::where('tehsil_status', 1)->get();
        return view('plot-allotments.edit',compact('specialEconomicZones', 'questions', 'businessStructures', 'provinces', 'districts', 'tehsils', 'plotAllotment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlotAllotmentRequest  $request
     * @param  \App\Models\PlotAllotment  $plotAllotment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePlotAllotmentRequest $request, PlotAllotment $plotAllotment)
    {
        $data = $request->validated();
        $plotAllotment->load('addresses');
        if($plotAllotment->addresses->isNotEmpty()) {
            $plotAllotment->addresses()->forceDelete();
        }

        if(isset($data['addresses']) && !empty($data['addresses'])) {
            $plotAllotment->addresses()->createMany($data['addresses']);
        }

        $plotAllotment->update($data);
        return redirect()
            ->route('plot-allotments.index')
            ->with('success_message', 'Plot Allotment Profile has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotAllotment  $plotAllotment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PlotAllotment $plotAllotment)
    {
        $plotAllotment->update(['status'=>!$plotAllotment->status]);
        return redirect()
            ->route('plot-allotments.index')
            ->with('success_message', 'Plot Allotment Profile has been changed successfully.');
    }
}
