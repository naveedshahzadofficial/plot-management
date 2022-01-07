<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpecialEconomicZoneRequest;
use App\Http\Requests\UpdateSpecialEconomicZoneRequest;
use App\Models\District;
use App\Models\SpecialEconomicZone;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class SpecialEconomicZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $query=SpecialEconomicZone::with('district');
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('district', function (SpecialEconomicZone $specialEconomicZone) {
                    return optional($specialEconomicZone->district)->district_name_e;
                })
                ->editColumn('total_area', function (SpecialEconomicZone $specialEconomicZone) {
                    return number_format($specialEconomicZone->total_area);
                })
                ->editColumn('status', function (SpecialEconomicZone $specialEconomicZone) {
                    return '<span class="label label-lg font-weight-bold label-inline '.($specialEconomicZone->status?'label-light-success':'label-light-danger').'">'.($specialEconomicZone->status?'Active':'Inactive').'</span>';
                })
                ->filterColumn('status', function($query, $keyword) {
                    $status_id = strtolower($keyword) === 'active'?'1':(strtolower($keyword) === 'inactive'?'0':'-1');
                    if($status_id != '-1')
                    $query->where('status', $status_id);
                })
                ->addColumn('action', function(SpecialEconomicZone $specialEconomicZone){
                    $actionBtn = '<a target="_blank" title="View Detail" href="'.route('special-economic-zones.show',$specialEconomicZone).'" class="btn btn-icon btn-outline-success btn-circle btn-xs mr-2"><i class="flaticon-eye"></i></a>';
                    $actionBtn .='<a href="'.route('special-economic-zones.edit',$specialEconomicZone).'" class="btn btn-icon btn-outline-success btn-circle btn-xs mr-2" title="Update"> <i class="flaticon2-edit"></i> </a>';
                    $actionBtn .='<a onclick="activate_inactive(this); return false;" href="'.route('special-economic-zones.destroy',$specialEconomicZone).'" class="btn btn-icon btn-circle btn-xs mr-2 '.($specialEconomicZone->status?'btn-outline-success':'btn-outline-danger').'" title="'.($specialEconomicZone->status?'Activate':'Deactivate').'"> <i class="'.($specialEconomicZone->status?'icon-xl fas fa-toggle-on':'icon-xl fas fa-toggle-off').'"></i> </a>';
                    $actionBtn .='<a href="'.route('special-economic-zones.sez-rates.index',$specialEconomicZone).'" class="btn btn-icon btn-outline-success btn-circle btn-xs mr-2" title="SEZ Rates"> <i class="fa fa-money-bill"></i> </a>';
                    $actionBtn .='<a href="'.route('special-economic-zones.master-plans.index',$specialEconomicZone).'" class="btn btn-icon btn-outline-success btn-circle btn-xs mr-2" title="Master Plans"> <i class="fa fa-building"></i> </a>';
                    $actionBtn .='<a href="'.route('special-economic-zones.industrial-zones.index',$specialEconomicZone).'" class="btn btn-icon btn-outline-success btn-circle btn-xs mr-2" title="Industrial Zones"> <i class="fa fa-industry"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['district','total_area','status','action'])
                ->make(true);
        }

        return view('special-economic-zones.index');
    }

    public function create(): View
    {
        $districts=District::where('district_status', 1)->get();
        return view('special-economic-zones.create',compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpecialEconomicZoneRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSpecialEconomicZoneRequest $request)
    {
        SpecialEconomicZone::create($request->validated());
        return redirect()
            ->route('special-economic-zones.index')
            ->with('success_message', 'Special Economic Zone has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @return \Illuminate\Http\Response
     */
    public function show(SpecialEconomicZone $specialEconomicZone)
    {
        $specialEconomicZone->load('district');
        return view('special-economic-zones.show',compact('specialEconomicZone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @return \Illuminate\Http\Response
     */
    public function edit(SpecialEconomicZone $specialEconomicZone)
    {
        $districts=District::where('district_status', 1)->get();
        return view('special-economic-zones.edit',compact('districts', 'specialEconomicZone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpecialEconomicZoneRequest  $request
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSpecialEconomicZoneRequest $request, SpecialEconomicZone $specialEconomicZone)
    {
        $specialEconomicZone->update($request->validated());
        return redirect()
            ->route('special-economic-zones.index')
            ->with('success_message', 'Special Economic Zone has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SpecialEconomicZone $specialEconomicZone)
    {
       $specialEconomicZone->update(['status'=>!$specialEconomicZone->status]);
       return redirect()
           ->route('special-economic-zones.index')
           ->with('success_message', 'Special Economic Zone status has been changed successfully.');
    }
}
