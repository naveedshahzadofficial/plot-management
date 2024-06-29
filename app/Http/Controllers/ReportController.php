<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    function industryInProduction()
    {
        if(request()->ajax()) {
            $sector = request()->input('sector');
            $data = $this->getIndustryInProductionData();
            if (!empty($sector)) {
                $data = array_filter($data, function ($item) use ($sector) {
                    return strtolower($item['sector_name']) == strtolower($sector);
                });
            }
            return DataTables::of($data)
                ->editColumn('in_production_since', function ($row) {
                    return Carbon::createFromFormat('d/m/Y', $row['in_production_since'])->format('d-m-Y');
                })
                ->make(true);
        }
        return view('reports.industry-in-production');
    }

    private function getIndustryInProductionData()
    {
        $path = public_path('assets/json/industry-in-production.json'); // Get the file path
        $json = file_get_contents($path); // Read the file content
        $data = json_decode($json, true); // Decode the JSON content into an associative array
        return $data; // Return the array
    }
}
