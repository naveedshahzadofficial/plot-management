<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array();
        $data['bar_graph1'] = $this->buildGraph1();
        $data['bar_graph2'] = $this->buildGraph2();
        return view('dashboard')->with($data);
    }

    private function buildGraph1()
    {
        $series = array();

        $raws = ['Rahim Yar Khan Industrial Estate', 'Bhalwal Industrial Estate', 'Vehari Industrial Estate', 'Quaid-e-Azam Business Park',
            'M-3 Industrial City', 'Value Addition City', 'Allama Iqbal Industrial City'];
        $users = array();
        foreach ($raws as $key=>$value){
            $user = new \stdClass;
            $user->id = $key + 1;
            $user->name = $value;
            $users[] = $user;
        }

        $obj = new \stdClass;
        $obj->name = "Total Plots";
        $obj->data = array(200, 320,180,690,480,100,420);
        $series[] = $obj;

        $obj = new \stdClass;
        $obj->name = "Allotted";
        $obj->data = array(120, 110,50,220,440,100,110);
        $series[] = $obj;

        $obj = new \stdClass;
        $obj->name = "Available";
        $obj->data = array(80, 210,130,470,40,0,310);
        $series[] = $obj;

        $data['series'] = $series;
        $data['users'] = $users;
        return $data;

    }

    private function buildGraph2()
    {
        $series = array();

        $raws = ['Rahim Yar Khan Industrial Estate', 'Bhalwal Industrial Estate', 'Vehari Industrial Estate', 'Quaid-e-Azam Business Park',
            'M-3 Industrial City', 'Value Addition City', 'Allama Iqbal Industrial City'];
        $users = array();
        foreach ($raws as $key=>$value){
            $user = new \stdClass;
            $user->id = $key + 1;
            $user->name = $value;
            $users[] = $user;
        }

        $obj = new \stdClass;
        $obj->name = "In Production";



        $obj->data = array(45,60,10,15,$this->makeUrlObj(230, route('reports.industry-in-production')),50,10);
        $series[] = $obj;

        $obj = new \stdClass;
        $obj->name = "Under Construction";
        $obj->data = array(20,10,5,35,235,20,60);
        $series[] = $obj;

        $data['series'] = $series;
        $data['users'] = $users;
        return $data;
    }

    private function makeUrlObj($value, $url): \stdClass
    {
        $obj_inner = new \stdClass;
        $obj_inner->y = $value;
        $obj_inner->url = $url;
        return $obj_inner;
    }
}
