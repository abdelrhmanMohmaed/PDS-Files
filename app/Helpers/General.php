<?php

use App\Models\CarePoint;
use App\Models\Gauges;
use App\Models\Measurement;
use App\Models\Packfile;
use App\Models\Workfile;
use App\Models\Pdsfile;
use App\Models\Qcp;
use App\Models\TrainingVideo;
use App\Models\Video;
use Carbon\Carbon;

function getData($models)
{
    $output = '';
    $output = '<option disabled selected value="">Open this select menu</option>';
    foreach ($models as $item) {
        $output .= '
    <option value="' . $item->id . '">
            ' . $item->name . '
    </option>';
    };
    return  $output;
}

function uploadImage($folder, $image)
{
    $imgName = $image->getClientOriginalName();
    $newName = time() . '-' . $imgName;

    $image->storeAs($folder, $newName);
    // $path = $image->move($folder, $newName);
    // return $path;
    return $newName;
}

function selectModel($modelName)
{
    $array = [
        'Packfile' => Packfile::class,
        'Pdsfile' => Pdsfile::class,
        'Workfile' => Workfile::class,
        'Video' => Video::class,
        'TrainingVideo' => TrainingVideo::class,
        'QCP' => QCP::class,
        'CarePoint' => CarePoint::class,
        'Measurement' => Measurement::class,
        'Gauges' => Gauges::class,
    ];

    return isset($array[$modelName]) ? new $array[$modelName] : back();
}

function productionAnalysis($request)
{
    @$week = $request->week;
    $currentWeek = Carbon::now()->weekOfYear;

    (@$week) ? $start = $week : $start = date('1');
    $counter =  $start;

    while ($counter <= $currentWeek) {
        $xaxis[] = "WK-" . $counter;
        $pdsConut[] = Pdsfile::where('week', '<=', $counter)->count() ?? 0;
        $workConut[] = Workfile::where('week', '<=', $counter)->count() ?? 0;
        $packConut[] = Packfile::where('week', '<=', $counter)->count() ?? 0;
        $videoConut[] = Video::where('week', '<=', $counter)->count() ?? 0;
        $counter = $counter + 1;
    }

    return response()->json([
        'xaxis' => ['weeks' => $xaxis],
        'series' => [
            'pds' => ['name' => 'PDS Files', 'data' => $pdsConut],
            'work' => ['name' => 'Work Instruction', 'data' => $workConut],
            'pack' => ['name' => 'PACK Instruction', 'data' => $packConut],
            'video' => ['name' => 'Videos', 'data' => $videoConut],
        ]
    ]);
}

function QualityAnalysis($request)
{
    @$week = $request->week;
    $currentWeek = Carbon::now()->weekOfYear;

    (@$week) ? $start = $week : $start = date('1');
    $counter =  $start;

    while ($counter <= $currentWeek) {
        $xaxis[] = "WK-" . $counter;
        $carePointCount[] = CarePoint::where('week',  '<=', $counter)->count() ?? 0;
        $qcpConut[] = Qcp::where('week', '<=', $counter)->count() ?? 0;
        $measurementConut[] = Measurement::where('week',  '<=', $counter)->count() ?? 0;
        $gaugesConut[] = Gauges::where('week',  '<=', $counter)->count() ?? 0;
        $counter = $counter + 1;
    }

    return response()->json([
        'xaxis' => ['weeks' => $xaxis],
        'series' => [
            'qcp' => ['name' => 'QCP Files', 'data' => $qcpConut],
            'carePoint' => ['name' => 'CarePoint Files', 'data' => $carePointCount],
            'cc' => ['name' => 'CC Measurement', 'data' => $measurementConut],
            'gauge' => ['name' => 'Gauges usage', 'data' => $gaugesConut],
        ]
    ]);
}
