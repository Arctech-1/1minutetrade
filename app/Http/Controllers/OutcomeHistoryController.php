<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutcomeHistoryController extends Controller
{
    public function index()
    {
        //$users = User::find(Auth::user()->id)->transactions;
        
        $outcomeHistory = Transaction::select('amount', 'updated_at')
        ->where('user_id', Auth::user()->id)
        ->where('type', 'withdrawal')->simplePaginate(3);
        
        return view('outcome', ['outcomeHistory' => $outcomeHistory]);

    } 
}
