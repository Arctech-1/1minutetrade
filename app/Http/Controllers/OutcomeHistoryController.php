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

        $outcomeHistory = Transaction::select('amount', 'balance', 'updated_at', 'payment_screenshot_path')
        ->where('user_id', Auth::user()->id)
        ->where('type', 'withdrawal')
        ->where('status', 'completed')
        ->orderBy('updated_at', 'desc')
        ->simplePaginate(10);

        return view('outcome', ['outcomeHistory' => $outcomeHistory]);

    }
}
