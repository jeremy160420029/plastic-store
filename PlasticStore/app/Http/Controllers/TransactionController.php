<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function showTransactions(Request $request)
    {
        $user = Auth::user();

        $transactions = Transaction::where('user_id', $user->id)->get();

        return view('main.transaction', compact('transactions'));
    }
}
