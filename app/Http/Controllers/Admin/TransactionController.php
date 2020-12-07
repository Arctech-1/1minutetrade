<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $userTransaction = User::with(['transactions' => function($query) {
        //     $query->where('status', 'completed');
        // }])->simplePaginate(3);

        $userTransaction = Transaction::where('status', 'completed')
                                        ->orderBy('created_at', 'desc')
                                        ->with('user')->simplePaginate(10);

        return view('admin.transactions', ['userTransaction' =>  $userTransaction]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function withdrawalIndex()
    {
        $withdrawTransaction = Transaction::where('status', 'pending')
                                        ->where('type', 'withdrawal')
                                        ->orderBy('created_at', 'desc')
                                        ->with('user', 'bankDetail')->simplePaginate(10);

        return view('admin.withdrawal-requests', ['withdrawTransaction' =>  $withdrawTransaction]);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $processWithdrawal = Transaction::where('status', 'pending')
        ->where('type', 'withdrawal')
       // ->where('user_id', $id)
        ->with('user', 'bankDetail')->where('id', $id)->get();

        return view('admin.process-withdrawal', ['processWithdrawal' => $processWithdrawal]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update users account balance and transaction balance
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $validatedData = $request->validate([
                'screenshot'      => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:500'],
            ]);

            if ($request->hasFile('screenshot')) {

            $screenshot = $request->file('screenshot');
            $screenshotName = $screenshot->getClientOriginalName();
            $screenshotPath = public_path('images/payments/');
            $screenshot->move($screenshotPath, $screenshotName);

            // using the loca driver
     //       $request->file('screenshot')->storeAs('payment_screenshot', $screenshotName, 'public');

            $transaction = Transaction::find($id);
            $user = User::find($transaction->user_id);
            $amount = $transaction->amount;
            $balance = $user->account_balance;
            $newBalance = $balance - $amount;

            // Update transaction record
            $transaction->update([
                'payment_screenshot_path'   => $screenshotName,
                'status'                    => 'completed',
                'balance'                   => $newBalance,
            ]);

            /* Update users account banlance */
            $user->update([
                'account_balance'   => $newBalance,
            ]);



            return redirect()->route('withdrawal.request', $id)->with('status', 'Transaction processed Successfully');
        }
        else{
            return redirect()->route('transactions.update', $id)->with('status', 'Could not upload image');
        }


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
