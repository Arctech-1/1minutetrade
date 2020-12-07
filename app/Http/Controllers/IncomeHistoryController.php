<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeHistoryController extends Controller
{
    // Show the income history of a User
    public function index()
    {
        //$users = User::find(Auth::user()->id)->transactions;

        $incomeHistory = Transaction::select('amount', 'balance', 'created_at')
        ->where('user_id', Auth::user()->id)
        ->where('type', 'credit')
        ->orderBy('created_at', 'desc')->simplePaginate(10);

        return view('income', ['incomeHistory' => $incomeHistory]);

    }
}
