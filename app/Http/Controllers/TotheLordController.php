<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tothelords;
use App\Models\tothelordcompleted;

class TotheLordController extends Controller
{
    public function saveTotheLord(Request $request) {
        $type = $request->input('type');
        /*$tothelord = tothelords::find(Session::get('loginId'));
        $currentTithes = $tothelord->tithes;
        $currentOffering = $tothelord->offering;
        $tothelord->tithes = 0;
        $completedtotheLord = new tothelordcompleted();
        $completedtotheLord->tithes_gave = $currentTithes;
        $completedtotheLord->offering_gave = $currentOffering;
        $completedtotheLord->UserId = Session::get('loginId');*/
        //$currenttithes = $request->input('tithesAmount');


        //$tothelord->update();
        //$completedtotheLord->save();
        return response()->json([
            'status'=>200,
            'message'=> $type .' saved successfully',
            //'message'=> $currenttithes,
        ]);
    }
}
