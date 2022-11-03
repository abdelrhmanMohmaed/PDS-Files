<?php

namespace App\Http\Controllers;

use App\Models\Packfile;
use App\Models\Part;
use App\Models\Pdsfile;
use App\Models\Workfile;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    public function index()
    {
        
        
        
        $pdsConut = Pdsfile::count();
        $workConut = Workfile::count();
        $packConut = Packfile::count();
        $partConut = Part::count();
        $pdsGet = Pdsfile::get();
        $workGet = Workfile::get();
        $packGet = Packfile::get();
        $partGet = Part::get();
        return view('analysis.index', compact(
            'partConut',
            'pdsConut',
            'workConut',
            'packConut',

            'partGet',
            'pdsGet',
            'workGet',
            'packGet',
        ));
    }
}
