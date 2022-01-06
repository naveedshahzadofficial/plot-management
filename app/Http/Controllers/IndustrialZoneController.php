<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIndustrialZoneRequest;
use App\Http\Requests\UpdateIndustrialZoneRequest;
use App\Models\IndustrialZone;
use App\Models\Sector;
use App\Models\SpecialEconomicZone;
use Illuminate\Contracts\Foundation\Application;
use Yajra\DataTables\DataTables;

class IndustrialZoneController extends Controller
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
            $query=IndustrialZone::where('special_economic_zone_id', $specialEconomicZone->id);
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('sector', function (IndustrialZone $industrialZone) {
                    return optional($industrialZone->sector)->name;
                })
                ->editColumn('area', function (IndustrialZone $industrialZone) {
                    return number_format($industrialZone->area);
                })
                ->editColumn('status', function (IndustrialZone $industrialZone) {
                    return '<span class="label label-lg font-weight-bold label-inline '.($industrialZone->status?'label-light-success':'label-light-danger').'">'.($industrialZone->status?'Active':'Inactive').'</span>';
                })
                ->filterColumn('status', function($query, $keyword) {
                    $status_id = strtolower($keyword) === 'active'?'1':(strtolower($keyword) === 'inactive'?'0':'-1');
                    if($status_id != '-1')
                        $query->where('status', $status_id);
                })
                ->addColumn('action', function(IndustrialZone $industrialZone) use ($specialEconomicZone) {
                    $actionBtn ='<a href="'.route('special-economic-zones.industrial-zones.edit',[$specialEconomicZone, $industrialZone]).'" class="btn btn-icon btn-outline-success btn-circle btn-sm mr-2" title="Update"> <i class="flaticon2-edit"></i> </a>';
                    $actionBtn .='<a onclick="activate_inactive(this); return false;" href="'.route('special-economic-zones.industrial-zones.destroy',[$specialEconomicZone, $industrialZone]).'" class="btn btn-icon btn-circle btn-sm mr-2 '.($industrialZone->status?'btn-outline-success':'btn-outline-danger').'" title="'.($industrialZone->status?'Activate':'Deactivate').'"> <i class="'.($industrialZone->status?'icon-xl fas fa-toggle-on':'icon-xl fas fa-toggle-off').'"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['area','status','action'])
                ->make(true);
        }
        $sectors = Sector::where('status', 1)->get();
        return view('industrial-zones.index', compact('specialEconomicZone', 'sectors'));
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
     * @param StoreIndustrialZoneRequest $request
     * @param \App\Models\SpecialEconomicZone $specialEconomicZone
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreIndustrialZoneRequest $request, SpecialEconomicZone $specialEconomicZone)
    {
        $specialEconomicZone->sezRates()->create($request->validated());
        return redirect()
            ->route('special-economic-zones.industrial-zones.index', $specialEconomicZone)
            ->with('success_message', 'Industrial Zone has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @param  \App\Models\IndustrialZone  $industrialZone
     * @return \Illuminate\Http\Response
     */
    public function show(SpecialEconomicZone $specialEconomicZone, IndustrialZone $industrialZone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @param  \App\Models\IndustrialZone  $industrialZone
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(SpecialEconomicZone $specialEconomicZone, IndustrialZone $industrialZone)
    {
        $sectors = Sector::where('status', 1)->get();
        return view('industrial-zones.index', compact('specialEconomicZone', 'industrialZone', 'sectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateIndustrialZoneRequest $request
     * @param \App\Models\SpecialEconomicZone $specialEconomicZone
     * @param \App\Models\IndustrialZone $industrialZone
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateIndustrialZoneRequest $request, SpecialEconomicZone $specialEconomicZone, IndustrialZone $industrialZone)
    {
        $industrialZone->update($request->validated());
        return redirect()
            ->route('special-economic-zones.industrial-zones.index', $specialEconomicZone)
            ->with('success_message', 'Industrial Zone has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @param  \App\Models\IndustrialZone  $industrialZone
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SpecialEconomicZone $specialEconomicZone, IndustrialZone $industrialZone)
    {
        $industrialZone->update(['status'=>!$industrialZone->status]);
        return redirect()
            ->route('special-economic-zones.industrial-zones.index',$specialEconomicZone)
            ->with('success_message', 'Industrial Zone status has been changed successfully.');
    }
}
