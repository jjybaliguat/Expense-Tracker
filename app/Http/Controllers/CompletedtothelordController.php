<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\completedtothelord;
use Session;

class CompletedtothelordController extends Controller
{
    public function view(){
        return view('user.viewcompletedtotheLord');

    }
    public function getItems(){
        $items = completedtothelord::where('UserId', Session::get('loginId'))->exists();

        if($items){
            $itemLists = completedtothelord::where('UserId', Session::get('loginId'))->orderBy('created_at', 'desc')->get();

            return response()->json([
                'status' => 200,
                'items' => $itemLists,
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message'=> "No Item found!",
            ]);
        }

    }
}
