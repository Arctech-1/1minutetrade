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

        // using eager loading to retrieve relationship data for Withdrawal requests
        $applyHistory = BankDetail::with(['transactions' => function($query){
            $query->where('user_id', Auth::user()->id)
                  ->where('status', 'pending')
                  ->where('type', 'withdrawal')
                  ->orderBy('created_at', 'desc');

        }])
        ->where('user_id', Auth::user()->id)
        ->get();

        return view('apply', ['apply' => $applyHistory]);

    }

    // to display form and attach user Bank details
    public function create()
    {
        $bankDetails = User::with(['bankDetails' => function ($query){
            $query->where('user_id', Auth::user()->id);
        }])->where('id', Auth::user()->id)->get();

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

    public function destroy(Request $request)
    {

        /* Deleting the Request Withrawal by retrieving the value passed to the query parameter  */
        if ($request->has('id')) {
            # code...
            // return "hi";
            $trans = Transaction::find($request->query('id'))
            ->where('user_id', Auth::user()->id)
            ->where('type', 'withdrawal')
            ->where('status', 'pending');
            $trans->delete();
            return redirect()->route('apply')->with('deleteStatus','Withdrawal Application deleted successfully');
        }
    }

    protected function validateWithdrawal($request)
    {

       $maxValue = Auth::user()->account_balance;
       $validatedData =  $request->validate([
            'amount' => ['required', 'numeric', 'min:1000', 'max:'. $maxValue, ]
        ]);
        return $validatedData;
    }


}
