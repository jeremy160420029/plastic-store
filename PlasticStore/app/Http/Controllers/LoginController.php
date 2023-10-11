<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home')->with('success', 'LOGOUT SUCCESS');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            if ($user->role === 'admin') {
                // Redirect to the admin dashboard route
                $transaction = DB::select(DB::raw('SELECT u.name, COUNT(t.id) AS total_pembelian FROM users u JOIN transactions t ON u.id = t.user_id GROUP BY u.id, u.name ORDER BY total_pembelian DESC'));
                // dd($transaction);
                $transactionnow = DB::select(DB::raw('SELECT DISTINCT u.name, p.name, p.price, HOUR(t.created_at) as jam, MINUTE(t.created_at) as menit, DATE(t.created_at) as tanggal FROM transactions t INNER JOIN transaction_details pt ON t.id = pt.transaction_id INNER JOIN products p ON pt.product_id = p.id INNER JOIN users u ON t.user_id = u.id ORDER BY t.created_at DESC'));

                return view('admin.adminhome', compact('transaction', 'transactionnow'));
            } else {
                // Retrieve cart items count for the authenticated user
                $cartItemCount = CartItem::where('user_id', $user->id)->count();

                session(['cart' => $cartItemCount]);

                return redirect()->route('home')->with('success', 'LOGIN SUCCESS');
            }
        }
        return redirect()->back()->withInput()->withErrors([
            'email' => 'Invalid login credentials.',
        ]);
    }
}
