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
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlotAllotmentRequest $request)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotAllotment $plotAllotment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlotAllotmentRequest  $request
     * @param  \App\Models\PlotAllotment  $plotAllotment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlotAllotmentRequest $request, PlotAllotment $plotAllotment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotAllotment  $plotAllotment
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlotAllotment $plotAllotment)
    {
        //
    }
}
