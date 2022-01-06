<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSezRateRequest;
use App\Http\Requests\UpdateSezRateRequest;
use App\Models\SezRate;
use App\Models\SpecialEconomicZone;
use Yajra\DataTables\DataTables;

class SezRateController extends Controller
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
            $query=SezRate::where('special_economic_zone_id', $specialEconomicZone->id);
            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('rate_per_acre', function (SezRate $sezRate) {
                    return number_format($sezRate->rate_per_acre);
                })
                ->editColumn('status', function (SezRate $sezRate) {
                    return '<span class="label label-lg font-weight-bold label-inline '.($sezRate->status?'label-light-success':'label-light-danger').'">'.($sezRate->status?'Active':'Inactive').'</span>';
                })
                ->filterColumn('status', function($query, $keyword) {
                    $status_id = strtolower($keyword) === 'active'?'1':(strtolower($keyword) === 'inactive'?'0':'-1');
                    if($status_id != '-1')
                        $query->where('status', $status_id);
                })
                ->addColumn('action', function(SezRate $sezRate) use ($specialEconomicZone) {
                    $actionBtn ='<a href="'.route('special-economic-zones.sez-rates.edit',[$specialEconomicZone, $sezRate]).'" class="btn btn-icon btn-outline-success btn-circle btn-sm mr-2" title="Update"> <i class="flaticon2-edit"></i> </a>';
                    $actionBtn .='<a onclick="activate_inactive(this); return false;" href="'.route('special-economic-zones.sez-rates.destroy',[$specialEconomicZone, $sezRate]).'" class="btn btn-icon btn-circle btn-sm mr-2 '.($sezRate->status?'btn-outline-success':'btn-outline-danger').'" title="'.($sezRate->status?'Activate':'Deactivate').'"> <i class="'.($sezRate->status?'icon-xl fas fa-toggle-on':'icon-xl fas fa-toggle-off').'"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['rate_per_acre','status','action'])
                ->make(true);
        }
        return view('sez-rates.index', compact('specialEconomicZone'));
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
     * @param StoreSezRateRequest $request
     * @param \App\Models\SpecialEconomicZone $specialEconomicZone
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSezRateRequest $request, SpecialEconomicZone $specialEconomicZone)
    {
        $specialEconomicZone->sezRates()->create($request->validated());
        return redirect()
            ->route('special-economic-zones.sez-rates.index', $specialEconomicZone)
            ->with('success_message', 'SEZ Rate has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @param  \App\Models\SezRate  $sezRate
     * @return \Illuminate\Http\Response
     */
    public function show(SpecialEconomicZone $specialEconomicZone, SezRate $sezRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @param  \App\Models\SezRate  $sezRate
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(SpecialEconomicZone $specialEconomicZone, SezRate $sezRate)
    {
        return view('sez-rates.index', compact('specialEconomicZone', 'sezRate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSezRateRequest $request
     * @param \App\Models\SpecialEconomicZone $specialEconomicZone
     * @param \App\Models\SezRate $sezRate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSezRateRequest $request, SpecialEconomicZone $specialEconomicZone, SezRate $sezRate)
    {
        $sezRate->update($request->validated());
        return redirect()
            ->route('special-economic-zones.sez-rates.index', $specialEconomicZone)
            ->with('success_message', 'SEZ Rate has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @param  \App\Models\SezRate  $sezRate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SpecialEconomicZone $specialEconomicZone, SezRate $sezRate)
    {
        $sezRate->update(['status'=>!$sezRate->status]);
        return redirect()
            ->route('special-economic-zones.sez-rates.index',$specialEconomicZone)
            ->with('success_message', 'SEZ Rate status has been changed successfully.');
    }
}
