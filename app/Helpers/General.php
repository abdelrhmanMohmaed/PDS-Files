<?php

use App\Models\CarePoint;
use App\Models\Gauges;
use App\Models\Measurement;
use App\Models\Packfile;
use App\Models\Workfile;
use App\Models\Pdsfile;
use App\Models\Qcp;
use App\Models\Video;

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
    switch ($modelName) {
        case 'Packfile':
            $model = new Packfile;
            break;
        case 'Pdsfile':
            $model = new Pdsfile;
            break;
        case 'Workfile':
            $model = new Workfile;
            break;
        case 'Video':
            $model = new Video;
            break;
        case 'QCP':
            $model = new Qcp;
            break;
        case 'CarePoint':
            $model = new CarePoint;
            break;
        case 'Measurement':
            $model = new Measurement;
            break;
        case 'Gauges':
            $model = new Gauges;
            break;
        default:
            return back();
            break;
    }
    return $model;
}

function productionAnalysis($request)
{
    @$week = $request->week;
    if (@$week) {
        $start = $week;
        $currentWeek = date('W');
        $counter =  $start;

        while ($counter <= $currentWeek) {
            $xaxis[] =  "WK-" . $counter;
            $pdsConut[] = Pdsfile::where('week',  '<=', $counter)->count()??0;
            $workConut[] = Workfile::where('week', '<=', $counter)->count()??0;
            $packConut[] = Packfile::where('week',  '<=', $counter)->count()??0;
            $videoConut[] = Video::where('week',  '<=', $counter)->count()??0;
            $counter = $counter + 1;
        }
    } else {
        $start = date('1');
        $currentWeek = date('W');
        $counter =  $start;

        while ($counter <= $currentWeek) {
            $xaxis[] = "WK-" . $counter;
            $pdsConut[] = Pdsfile::where('week',  '<=', $counter)->count()??0;
            $workConut[] = Workfile::where('week', '<=', $counter)->count()??0;
            $packConut[] = Packfile::where('week',  '<=', $counter)->count()??0;
            $videoConut[] = Video::where('week',  '<=', $counter)->count()??0;
            $counter = $counter + 1;
        }
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
    if (@$week) {
        $start = $week;
        $currentWeek = date('W');
        $counter =  $start;

        while ($counter <= $currentWeek) {
            $xaxis[] =  "WK-" . $counter;
            $carePointCount[] = CarePoint::where('week',  '<=', $counter)->count()??0;
            $qcpConut[] = Qcp::where('week', '<=', $counter)->count()??0;
            $measurementConut[] = Measurement::where('week',  '<=', $counter)->count()??0;
            $gaugesConut[] = Gauges::where('week',  '<=', $counter)->count()??0;
            $counter = $counter + 1;
        }
    } else {
        $start = date('1');
        $currentWeek = date('W');
        $counter =  $start;

        while ($counter <= $currentWeek) {
            $xaxis[] = "WK-" . $counter;
            $carePointCount[] = CarePoint::where('week',  '<=', $counter)->count()??0;
            $qcpConut[] = Qcp::where('week', '<=', $counter)->count()??0;
            $measurementConut[] = Measurement::where('week',  '<=', $counter)->count()??0;
            $gaugesConut[] = Gauges::where('week',  '<=', $counter)->count()??0;
            $counter = $counter + 1;
        }
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
