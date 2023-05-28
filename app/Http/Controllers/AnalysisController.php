<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalysisController extends Controller
{
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
