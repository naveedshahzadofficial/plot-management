<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\SpecialAreaZone;
use App\Models\Zones;
use App\Http\Requests\StoreAreaZone;
use App\Http\Requests\StoreZone;
use App\Http\Requests\UpdateZone;
use DataTables;
class SpecialAreaZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $query=SpecialAreaZone::with('district');
         
            return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('name', function (SpecialAreaZone $zone) {
                return $zone->name;
            })
            ->addColumn('district', function (SpecialAreaZone $zone) {
                return $zone->district->district_name_e;
            })
            ->addColumn('latitide', function (SpecialAreaZone $zone) {
                return $zone->latitide;
            })
            ->addColumn('longitude', function (SpecialAreaZone $zone) {
                return $zone->longitude;
            })
            ->addColumn('status', function (SpecialAreaZone $zone) {
                if($zone->status=='Active'){
                    $title='Active';
                    $class='label-light-success';
                }else{
                    $title='Inactive';
                    $class=' label-light-danger';
                }
                  $form="<span class='label label-lg font-weight-bold ".$class." label-inline'>$title</span>";
                
                  return $form;
                   
            })
            ->addColumn('action', function(SpecialAreaZone $zone){

                
                if($zone->status=='Active'){
                    $title='Activate';
                    $class='icon-xl fas fa-toggle-on';
                    $color='btn-outline-success';
                   }else{
                    $title='Deactivate';
                    $class=' icon-xl fas fa-toggle-off';
                    $color="btn-outline-danger";
                   }
             
                   
                  $btn ='<a href="special_zones/'.$zone->id.'/edit"" class="btn btn-icon btn-outline-success btn-circle btn-sm mr-2" title="Update">
                  <i class="flaticon2-edit"></i>
              </a>';

            
               $form="<a onclick='activate_inactive(this); return false;'
               href='special_zones/".$zone->id."'
               class='btn btn-icon ".$color." btn-circle btn-sm mr-2' title='".$title."'>
               	   <i class=' ".$class."'></i>	           
                      </a>";
              $btn.=$form;
            return $btn;
            })
            ->rawColumns(['action','status'])
            ->make(true);
          
        }
        return view('special_zones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts=District::all();
        return view('special_zones.create',compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAreaZone $request)
    {
        SpecialAreaZone::create($request->all());
      return redirect()->route('special_zones.index')->with('message','Special Area Zone created successfully.');
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
        $zone =SpecialAreaZone::find($id);
       
         $districts=District::all();
         return view('special_zones.edit',compact('districts','zone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAreaZone $request, $id)
    {
        
        $input = $request->all();
        $zone = SpecialAreaZone::find($id);
        $zone->update($input);

        return redirect()->route('special_zones.index')
        ->with('message','Special Area Zone updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zone=SpecialAreaZone::find($id);

        $ststus=$zone->status;
       if($ststus=='Active'){
           $data['status']='Inactive';
     
       }else{
        $data['status']='Active';
       }
       $zone->update($data);

        return redirect()->route('special_zones.index')->with('message','Special Area Zone status changed successfully');
    }

    public function zones(Request $request)
    {
        if ($request->ajax()) {
            
            $query=Zones::with('area_zone');
         
            return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('name', function (Zones $zone) {
                return $zone->name;
            })
            ->addColumn('area_zone', function (Zones $zone) {
                return $zone->area_zone->name;
            })
            ->addColumn('latitide', function (Zones $zone) {
                return $zone->latitide;
            })
            ->addColumn('longitude', function (Zones $zone) {
                return $zone->longitude;
            })
            ->addColumn('status', function (Zones $zone) {
                if($zone->status=='Active'){
                    $title='Active';
                    $class='label-light-success';
                }else{
                    $title='Inactive';
                    $class=' label-light-danger';
                }
                  $form="<span class='label label-lg font-weight-bold ".$class." label-inline'>$title</span>";
                
                  return $form;
                   
            })
            ->addColumn('action', function(Zones $zone){

                
                if($zone->status=='Active'){
                    $title='Activate';
                    $class='icon-xl fas fa-toggle-on';
                    $color='btn-outline-success';
                   }else{
                    $title='Deactivate';
                    $class=' icon-xl fas fa-toggle-off';
                    $color="btn-outline-danger";
                   }
             
                   
                  $btn ='<a href="zone/edit/'.$zone->id.'" class="btn btn-icon btn-outline-success btn-circle btn-sm mr-2" title="Update">
                  <i class="flaticon2-edit"></i>
              </a>';

            
               $form="<a onclick='activate_inactive(this); return false;'
               href='zone/delete/".$zone->id."'
               class='btn btn-icon ".$color." btn-circle btn-sm mr-2' title='".$title."'>
               	   <i class=' ".$class."'></i>	           
                      </a>";
              $btn.=$form;
            return $btn;
            })
            ->rawColumns(['action','status'])
            ->make(true);
          
        }
        return view('special_zones.zones.index');
    }


    public function zonesDelete($id)
    {
        $zone=Zones::find($id);

        $ststus=$zone->status;
       if($ststus=='Active'){
           $data['status']='Inactive';
     
       }else{
        $data['status']='Active';
       }
       $zone->update($data);

        return redirect()->route('zones')->with('message','Zone status changed successfully');
    }


    public function zoneCreate()
    {
        $zones=SpecialAreaZone::where('status',1)->get();
       
        return view('special_zones.zones.create',compact('zones'));
    }

    public function zoneStore(StoreZone $request)
    {
        Zones::create($request->all());
        return redirect()->route('zones')->with('message','Zone created successfully.');
    }


    public function zoneEdit($id)
    {
        $zone =Zones::find($id);
        $area_zones=SpecialAreaZone::where('status',1)->get();
         return view('special_zones.zones.edit',compact('zone','area_zones'));
    }

    public function zoneUpdate (UpdateZone $request, $id)
    {
        
        $input = $request->all();
        $zone = Zones::find($id);
        $zone->update($input);

        return redirect()->route('zones')
        ->with('message','Zone updated successfully');
    
    }

}
