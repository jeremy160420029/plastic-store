<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;

class TransactionDetailController extends Controller
{
    public function show($id)
    {
        $transactionDetails = TransactionDetail::with('product')->where('transaction_id', $id)->get();

        return view('main.transactiondetail', compact('transactionDetails'));
    }


    public function showAdm($id)
    {
        $transactionDetails = TransactionDetail::with('product','transaction')->where('transaction_id', $id)->get();
        $transaction = Transaction::with('user')->where('id', "=", $id)->get();
        // dd($transaction);
        return view('admin.transaction.admintransactiondetail', compact("transactionDetails", "transaction"));
    }
}
