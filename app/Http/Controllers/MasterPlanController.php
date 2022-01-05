<?php

namespace App\Http\Controllers;

use App\Models\MasterPlan;
use App\Models\SpecialEconomicZone;
use Illuminate\Http\Request;

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
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SpecialEconomicZone $specialEconomicZone)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @param  \App\Models\MasterPlan  $masterPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpecialEconomicZone $specialEconomicZone, MasterPlan $masterPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpecialEconomicZone  $specialEconomicZone
     * @param  \App\Models\MasterPlan  $masterPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpecialEconomicZone $specialEconomicZone, MasterPlan $masterPlan)
    {
        //
    }
}
