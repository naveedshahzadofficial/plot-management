<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use DataTables;
use Carbon\Carbon;
use stdClass;

class JobController extends Controller
{

  public function index(Request $request){

  
        if ($request->ajax()) {
        
            $query = Job::query();
         
            return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('payload', function (Job $job) {


            /*  $jsonpayload = json_decode($job->payload,true);

               $str = str_replace('u0000', ' ', $jsonpayload['data']['command']);
               return  $unserialized = ($str, ['allowed_classes' => false]);
*/

  
       $job_details = json_decode($job->payload);

// return $job_details['displayName'];
            $job = ( unserialize($job_details->data->command));
            $resposne = '';
            foreach($job->getDetails() as $key => $val){
              if(!empty($val))
              $resposne .= "$key=$val, ";
            }
           return $resposne;
            exit;
            return(implode('\{',$this->stdToArray($job)));

                
            })
            ->addColumn('exception', function (Job $job) {
                return  substr(implode('\n',explode("\n", $job->exception)) , 0,400)   ;
            })
            ->addColumn('failed_at', function (Job $job) {
                return Carbon::parse($job->failed_at)->format('Y-m-d');
                
            })
           
            ->addColumn('action', function(Job $job){
                   
                  $btn ='<a href="job/retry/'.$job->uuid.'"" class="btn btn-icon btn-outline-success btn-circle btn-sm mr-2" title="Retry">
                  <i class="flaticon2-edit"></i>
              </a>';

            return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);

          
        }
        return view('jobs.index');


  }

  function stdToArray($obj){
  $reaged = (array)$obj;
  foreach($reaged as $key => &$field){
    if(is_object($field))$field = stdToArray($field);
  }
  return $reaged;
}

 

}
