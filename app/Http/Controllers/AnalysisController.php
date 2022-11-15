<?php

namespace App\Http\Controllers;

use App\Models\Packfile;
use App\Models\Pdsfile;
use App\Models\Video;
use App\Models\Workfile;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    public function index()
    {
        return view('analysis.index');
    }

    public function analysisData(Request $request)
    {

        @$week = $request->week;
        if (@$week) {
            $start = $week;
            $currentWeek = date('W');
            $counter =  $start;

            while ($counter <= $currentWeek) {
                $xaxis[] =  "WK-" . $counter;
                $pdsConut[] = Pdsfile::where('week',  '<=', $counter)->count();
                $workConut[] = Workfile::where('week', '<=', $counter)->count();
                $packConut[] = Packfile::where('week',  '<=', $counter)->count();
                $videoConut[] = Video::where('week',  '<=', $counter)->count();
                $counter = $counter + 1;
            }
        } else {
            $start = date('44');
            $currentWeek = date('W');
            $counter =  $start;

            while ($counter <= $currentWeek) {
                $xaxis[] = "WK-" . $counter;
                $pdsConut[] = Pdsfile::where('week',  '<=', $counter)->count();
                $workConut[] = Workfile::where('week', '<=', $counter)->count();
                $packConut[] = Packfile::where('week',  '<=', $counter)->count();
                $videoConut[] = Video::where('week',  '<=', $counter)->count();
                $counter = $counter + 1;
            }
        }
        return response()->json([
            'xaxis' => ['weeks' => $xaxis],
            'series' => [
                'pds' => ['name' => 'PDS Files', 'data' => $pdsConut],
                'work' => ['name' => 'Work Files', 'data' => $workConut],
                'pack' => ['name' => 'Pack Files', 'data' => $packConut],
                'video' => ['name' => 'Videos', 'data' => $videoConut],
            ]
        ]);
    }
}
