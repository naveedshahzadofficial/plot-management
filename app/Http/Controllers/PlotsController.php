<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plot;
use App\Models\Zones;
use App\Http\Requests\StorePlot;
use App\Http\Requests\UpdatePlot;
use DataTables;

class PlotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        if ($request->ajax()) {
            
            $query=Plot::with('zone');
         
            return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('number', function (Plot $plot) {
                return $plot->number;
            })
            ->addColumn('zone', function (Plot $plot) {
                return $plot->zone->name;
            })
            ->addColumn('latitide', function (Plot $plot) {
                return $plot->latitide;
            })
            ->addColumn('longitude', function (Plot $plot) {
                return $plot->longitude;
            })
            ->addColumn('status', function (Plot $plot) {
                if($plot->status=='Active'){
                    $title='Active';
                    $class='label-light-success';
                }else{
                    $title='Inactive';
                    $class=' label-light-danger';
                }
                  $form="<span class='label label-lg font-weight-bold ".$class." label-inline'>$title</span>";
                
                  return $form;
                   
            })
            ->addColumn('action', function(Plot $plot){

                
                if($plot->status=='Active'){
                    $title='Activate';
                    $class='icon-xl fas fa-toggle-on';
                    $color='btn-outline-success';
                   }else{
                    $title='Deactivate';
                    $class=' icon-xl fas fa-toggle-off';
                    $color="btn-outline-danger";
                   }
             
                   
                  $btn ='<a href="plots/'.$plot->id.'/edit"" class="btn btn-icon btn-outline-success btn-circle btn-sm mr-2" title="Update">
                  <i class="flaticon2-edit"></i>
              </a>';

            
               $form="<a onclick='activate_inactive(this); return false;'
               href='plots/".$plot->id."'
               class='btn btn-icon ".$color." btn-circle btn-sm mr-2' title='".$title."'>
               	   <i class=' ".$class."'></i>	           
                      </a>";
              $btn.=$form;
            return $btn;
            })
            ->rawColumns(['action','status'])
            ->make(true);
          
        }
        return view('special_zones.plot.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones=Zones::where('status',1)->get();
        return view('special_zones.plot.create',compact('zones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlot $request)
    {
        Plot::create($request->all());
      return redirect()->route('plots.index')->with('message','Plot created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plot =Plot::find($id);
        $zones=Zones::where('status',1)->get();
        return view('special_zones.plot.edit',compact('plot','zones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlot $request, $id)
    {
        
        $input = $request->all();
        $zone = Plot::find($id);
        $zone->update($input);

        return redirect()->route('plots.index')
        ->with('message','Plot updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plot=Plot::find($id);

        $ststus=$plot->status;
       if($ststus=='Active'){
           $data['status']='Inactive';
     
       }else{
        $data['status']='Active';
       }
       $plot->update($data);

        return redirect()->route('plots.index')->with('message','Plot status changed successfully');
    }
}
