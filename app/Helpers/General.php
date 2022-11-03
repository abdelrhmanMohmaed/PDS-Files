<?php

use App\Models\Packfile;
use App\Models\Workfile;
use App\Models\Pdsfile;
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
        default:
            return back();
            break;
    }
    return $model;
}

 
