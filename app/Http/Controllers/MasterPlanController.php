<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMasterPlanRequest;
use App\Http\Requests\UpdateMasterPlanRequest;
use App\Models\MasterPlan;
use App\Models\SpecialEconomicZone;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class MasterPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @return \Illuminate\Http\Response
     */
    public function index(SpecialEconomicZone $specialEconomicZone)
    {
        if(request()->ajax()) {
            $query=MasterPlan::where('special_economic_zone_id', $specialEconomicZone->id);
            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('master_plan_file', function (MasterPlan $masterPlan) {
                    return '<a target="_blank" href="'.Storage::url($masterPlan->master_plan_file).'" title="Master Plan" class="btn btn-icon btn-outline-success btn-circle btn-sm"/><i class="flaticon2-download"></i></a>';
                })
                ->editColumn('status', function (MasterPlan $masterPlan) {
                    return '<span class="label label-lg font-weight-bold label-inline '.($masterPlan->status?'label-light-success':'label-light-danger').'">'.($masterPlan->status?'Active':'Inactive').'</span>';
                })
                ->filterColumn('status', function($query, $keyword) {
                    $status_id = strtolower($keyword) === 'active'?'1':(strtolower($keyword) === 'inactive'?'0':'-1');
                    if($status_id != '-1')
                        $query->where('status', $status_id);
                })
                ->addColumn('action', function(MasterPlan $masterPlan) use ($specialEconomicZone) {
                    $actionBtn ='<a href="'.route('special-economic-zones.master-plans.edit',[$specialEconomicZone, $masterPlan]).'" class="btn btn-icon btn-outline-success btn-circle btn-sm mr-2" title="Update"> <i class="flaticon2-edit"></i> </a>';
                    $actionBtn .='<a onclick="activate_inactive(this); return false;" href="'.route('special-economic-zones.master-plans.destroy',[$specialEconomicZone, $masterPlan]).'" class="btn btn-icon btn-circle btn-sm mr-2 '.($masterPlan->status?'btn-outline-success':'btn-outline-danger').'" title="'.($masterPlan->status?'Activate':'Deactivate').'"> <i class="'.($masterPlan->status?'icon-xl fas fa-toggle-on':'icon-xl fas fa-toggle-off').'"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['master_plan_file','status','action'])
                ->make(true);
        }

        return view('master-plans.index', compact('specialEconomicZone'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @return \Illuminate\Http\Response
     */
    public function create(SpecialEconomicZone $specialEconomicZone)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMasterPlanRequest $request
     * @param \App\Models\SpecialEconomicZone $specialEconomicZone
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMasterPlanRequest $request, SpecialEconomicZone $specialEconomicZone)
    {
        $data = $request->validated();
        if ($request->hasFile('master_plan_file')) {
            $file = $request->file('master_plan_file');
            $data['master_plan_file'] = $file->store('master-plans', 'public');
        }
        $specialEconomicZone->masterPlans()->create($data);
        return redirect()
            ->route('special-economic-zones.master-plans.index', $specialEconomicZone)
            ->with('success_message', 'Master Plans has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @param  \App\Models\MasterPlan  $masterPlan
     * @return \Illuminate\Http\Response
     */
    public function show(SpecialEconomicZone $specialEconomicZone, MasterPlan $masterPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @param  \App\Models\MasterPlan  $masterPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(SpecialEconomicZone $specialEconomicZone, MasterPlan $masterPlan)
    {
        return view('master-plans.index', compact('specialEconomicZone', 'masterPlan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMasterPlanRequest $request
     * @param \App\Models\SpecialEconomicZone $specialEconomicZone
     * @param \App\Models\MasterPlan $masterPlan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMasterPlanRequest $request, SpecialEconomicZone $specialEconomicZone, MasterPlan $masterPlan)
    {
        $data = $request->validated();
        if ($request->hasFile('master_plan_file')) {
            $file = $request->file('master_plan_file');
            $data['master_plan_file'] = $file->store('master-plans', 'public');
        }
        $masterPlan->update($data);
        return redirect()
            ->route('special-economic-zones.master-plans.index', $specialEconomicZone)
            ->with('success_message', 'Master Plan has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @param  \App\Models\MasterPlan  $masterPlan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SpecialEconomicZone $specialEconomicZone, MasterPlan $masterPlan)
    {
        $masterPlan->update(['status'=>!$masterPlan->status]);
        return redirect()
            ->route('special-economic-zones.master-plans.index',$specialEconomicZone)
            ->with('success_message', 'Master Plan status has been changed successfully.');
    }
}
