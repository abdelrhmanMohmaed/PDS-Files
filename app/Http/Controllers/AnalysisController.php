<?php

namespace App\Http\Controllers;

use App\Models\Packfile;
use App\Models\Pdsfile;
use App\Models\Video;
use App\Models\Workfile;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    public function productionindex()
    {
        return view('analysis.index');
    }

    public function Qualityindex()
    {
        return view('analysis.quality');
    }

    public function analysisData(Request $request, $modal)
    {
        if (!$modal)  return redirect()->route('home')->with('wrong', 'Something is wrong please try again!!');
    
        switch ($modal) {
            case 'production':
                return productionAnalysis($request);
                break;
            case 'quality':
                return QualityAnalysis($request);
                break;
            default:
                break;
        }
    }
}
