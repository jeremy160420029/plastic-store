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

    public function index()
    {
        $transaction = Transaction::all();

        return view('admin.transaction.admintransaction',compact('transaction'));
    }

    public function indexDeliv(){
        $deliv = Transaction::all();
        return view('admin.transaction.admindelivery',compact('deliv'));
    }

    // public function updateDeliv($id){
    //     $deliv = Transaction::where("id", $id)->first();
    //     $deliv->delivery_status = "Delivered";
    //     // $deliv->delivery_status = "Pending";
    //     $deliv->save();
    //     dd($deliv);
    //     // return redirect()->route("admtransaction.shipment")->with("message", "Update Successfull");
    // }

    public function updateDeliv(Request $request){
        $id = $request->get('id');
        $data = Transaction::find($id);
        $data->delivery_status = "Delivered";
        // $data->delivery_status = "Pending";
        $data->save();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Delivery Status berhasil di ubah'
        ), 200);
    }


    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $data = Transaction::find($id);
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Transaksi berhasil di hapus'
        ), 200);
    }
}
