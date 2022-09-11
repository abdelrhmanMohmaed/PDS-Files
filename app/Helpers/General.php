<?php

use App\Models\Packfile;
use App\Models\Workfile;
use App\Models\Pdsfile;

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
        default:
            return back();
            break;
    }
    return $model;
}
