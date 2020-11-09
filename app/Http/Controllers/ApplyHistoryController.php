<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\BankDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class ApplyHistoryController extends Controller
{
    //
    public function index(Request $request)
    {
        /* Deleting the Request Withrawal by retrieving the value passed to the query parameter  */
        if ($request->has('transaction')) {
            # code...
            $trans = Transaction::find($request->query('transaction'));
            $trans->delete();
            return redirect()->route('apply')->with('status','Withdrawal Request deleted successfully');
        } 
        else {
        // using eager loading to retrieve relationship data for Withdrawal requests
        $applyHistory = BankDetail::with(['transactions' => function($query){
            $query->where('user_id', Auth::user()->id)
                  ->where('status', 'pending')
                  ->where('type', 'withdrawal');
                  
        }])
        ->where('user_id', Auth::user()->id)
        ->get();
        
        return view('apply', ['apply' => $applyHistory]);
        }
    }

    // to display form and attach user Bank details
    public function create()
    {
        $bankDetails = User::with(['bankDetails' => function ($query){
            $query->where('user_id', Auth::user()->id);
        }])->where('id', Auth::user()->id)->get();
        
        // dd($bankDetails);
        return view('applyWithdrawal', ['bankDetails' => $bankDetails]);
    }

    // to store input values retrieved from the withdrawal form request
    public function store(Request $request)
    {
        $this->validateWithdrawal($request);
        $transaction = new Transaction(request(['amount']));
        $transaction->user_id = Auth::user()->id;
        $transaction->bank_id = $request->bank;
        $transaction->type = 'withdrawal';
        $transaction->save();

        return redirect()->route('apply')->with('status','Withdrawal Request sent successfully'); 
        
    }

    public function deleteT(Request $request)
    {
        
        // Transaction::where('id', $id)->destroy();
        //DB::delete('delete transaction where id = ?', [$id]);
       // 
    }

    protected function validateWithdrawal($request)
    {
       $validatedData =  $request->validate([
            'amount' => 'required',
        ]);
        return $validatedData;
    }


}
