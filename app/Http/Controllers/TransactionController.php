<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\transactions;
use App\Models\User;
use App\Models\tothelords;
use App\Models\completedtothelord;
use Session;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Description'=>'required',
            'Amount'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $transaction = new transactions();
            $id = Session::get('loginId');
            $type = $request->input('TransactionType');
            $transaction->TransactionType = $type;
            $transaction->Description = $request->input('Description');
            $transaction->Amount = $request->input('Amount');
            $transaction->disabled = false;
            $transaction->UserId = $id;
            
            //$currentTithes = $totheLordId->tithes;
            if($type == 'Income'){
                $tithe_percent = Session::get('tithes_percent');
                $offering_percent = Session::get('offering_percent');
                $addedtithes = ($request->input('Amount'))*$tithe_percent;
                $addedoffering = ($request->input('Amount'))*$offering_percent;

                $totheLordId = tothelords::where('id', $id)->exists();
                $tothelord = tothelords::find($id);   
                if($totheLordId){
                    $currentTithes = $tothelord->tithes;
                    $currentOffering = $tothelord->offering;
                    $tothelord->tithes = $addedtithes + $currentTithes;
                    $tothelord->offering = $addedoffering + $currentOffering;
                    $tothelord->update();
                }else{
                    $tothelord = new tothelords();
                    $tothelord->tithes = $addedtithes;
                    $tothelord->offering = $addedoffering;
                    $tothelord->id = $id;
                    $tothelord->save();
                }
            }else{
                $addedtithes = 0;
                $addedoffering = 0;
            }
            $transaction->tithes = $addedtithes;
            $transaction->offering = $addedoffering;

            $transaction->save();
            return response()->json([
                'status'=>200,
                'message'=> $type." Added Successfully",
                //'message'=>$currentTithes,
            ]);
        }
    }

    public function updateTransaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Description'=>'required',
            'Amount'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $id = $request->input('Transaction_id');
            $type = $request->input('TransactionType');
            $transaction = transactions::find($id);
            $tothelord = tothelords::find(Session::get('loginId'));
            $tothelordtithes = $tothelord->tithes;
            $tothelordoffering = $tothelord->offering;
            $currentamount = $request->input('Amount');
            $previousamount = $transaction->Amount;
            $currenttithes = $transaction->tithes;
            $amountdiff = $currentamount - $previousamount;
            if($type == 'Income'){
                if($previousamount < $currentamount){//updated amount is higher
                    $amountdiff = $currentamount - $previousamount;
                    $tithesadd = $amountdiff * Session::get('tithes_percent');
                    $offeringadd = $amountdiff * Session::get('offering_percent');
                    //$transaction->tithes = $currenttithes + $tithesadd;
                    $transaction->tithes = $currenttithes + $tithesadd;
                    $tothelord->tithes = $tothelordtithes + $tithesadd;
                    $tothelord->offering = $tothelordoffering + $offeringadd;
                    $tothelord->update();
                }elseif($previousamount > $currentamount){//updated amount is lower
                    $amountdiff = $previousamount - $currentamount;
                    $tithesdeduc = $amountdiff * Session::get('tithes_percent');
                    $transaction->tithes = $currenttithes - $tithesdeduc;
                }
            }
            $transaction->Description = $request->input('Description');
            $transaction->Amount = $request->input('Amount');
        
            $transaction->update();
            return response()->json([
                'status'=>200,
                'message'=> $type .' updated Successfully',
                //'message'=> $tothelordtithes,
            ]);
        }
    }

    public function deleteTransaction(Request $request)
    {
            $id = $request->input('Transaction_id');
            $type = $request->input('Transaction_type');
            $transaction = transactions::find($id);
            $tothelord = tothelords::find(Session::get('loginId'));
            $deletedTithes = $transaction->tithes;
            $currentTithes = $tothelord->tithes;
            if($currentTithes > 0){
                $tothelord->tithes = $currentTithes - $deletedTithes;
                $tothelord->update();
            }
            $transaction->delete();
            return response()->json([
                'status'=>200,
                'message'=> $type .' deleted Successfully',
            ]);
    }

    public function saveTotheLord(Request $request) {
        $type = $request->input('type');
        $id = Session::get('loginId');
        $tothelord = tothelords::find($id);
        $update = [
            'disabled' => true,
        ];
        $transaction = transactions::where('UserId', $id)->update($update);
        $completedtotheLord = new completedtothelord();
        $currentTithes = $tothelord->tithes;
        $currentOffering = $tothelord->offering;
        $completedtotheLord->tithesGave = $currentTithes;
        $completedtotheLord->offeringGave = $currentOffering;
        $completedtotheLord->UserId = $id;
        $tothelord->tithes = 0; 

        $completedtotheLord->save();
        $tothelord->update();
        return response()->json([
            'status'=>200,
            'message'=> $type .' saved successfully',
            //'message'=> $currentTithes." ".$currentOffering,
        ]);
    }
    
    public function getTransactions()
    {
        $transactions = transactions::where('UserId', Session::get('loginId'))->exists();
        if($transactions){
            $transactions = transactions::where('UserId', Session::get('loginId'))->orderBy('created_at', 'desc')->get();
            $Income = transactions::where('TransactionType', 'Income')->where('UserId', Session::get('loginId'))->get();
            $Expense = transactions::where('TransactionType', 'Expense')->where('UserId', Session::get('loginId'))->get();
            $totheLord = tothelords::where('id', Session::get('loginId'))->get();
            
            return response()->json([
            'income'=>$Income,
            'expense'=>$Expense,
            'totheLord'=>$totheLord,
            'transactions'=>$transactions,
        ]);
        }else{
            return response()->json([
            'status'=>400,
            'message'=>'No Transaction Found!',
        ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
