<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

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
                return redirect()->route('dashboard')->with('success', 'LOGIN SUCCESS');
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
