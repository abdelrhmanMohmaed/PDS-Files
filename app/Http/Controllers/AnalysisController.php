<?php

namespace App\Http\Controllers;

use App\Models\Packfile;
use App\Models\Pdsfile;
use App\Models\Workfile;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    public function index()
    {
        return view('analysis.index');
    }

    public function analysisData()
    {
        $start = date('W', strtotime("-5 week"));
        $currentWeek = date('W');
        $counter =  $start;

        while ($counter <= $currentWeek) {
            // $xaxis[] = date('W', strtotime($counter));

            $xaxis[] = $counter;
            $pdsConut[] = Pdsfile::where('week',  $counter)->count();
            $workConut[] = Workfile::where('week',  $counter)->count();
            $packConut[] = Packfile::where('week',  $counter)->count();
            $counter = $counter + 1;

            // $counter = date('W', strtotime('+1 week', strtotime($counter)));
        }

        return response()->json([
            'xaxis' => ['weeks' => $xaxis],
            'series' => [
                'pds' => ['name' => 'PDS Files', 'data' => $pdsConut],
                'work' => ['name' => 'Work Files', 'data' => $workConut],
                'pack' => ['name' => 'Pack Files', 'data' => $packConut],
            ]
        ]);
    }
}
