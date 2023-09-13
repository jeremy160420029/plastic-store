<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionDetail;

class TransactionDetailController extends Controller
{
    public function show($id)
    {
        $transactionDetails = TransactionDetail::with('product')->where('transaction_id', $id)->get();

        return view('main.transactiondetail', compact('transactionDetails'));
    }
}
