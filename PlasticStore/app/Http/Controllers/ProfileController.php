<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function showProfile()
    {
        return view('auth.profile');
    }

    public function showProfilePass()
    {
        return view('auth.changepassword');
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|min:10|max:12',
        ]);

        // Get the authenticated user's ID
        $userId = auth()->id();

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = User::where("id", "=", $userId)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->save();

            return redirect()->route('profile')->with('success', 'Profile information updated successfully.');
        }
    }

    public function updateAddress(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
        ]);

        // Get the authenticated user's ID
        $userId = auth()->id();

        // Find the user by ID
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('auth.profile')->with('error', 'User not found.');
        }

        // if ($request->fails()) {
        //     return redirect()->back()
        //         ->withErrors($request)
        //         ->withInput();
        // }

        // Update the user's address fields
        $user->street_address = $request->input('street_address');
        $user->city = $request->input('city');
        $user->postal_code = $request->input('postal_code');
        $user->save();

        return redirect()->route('profile')->with('success', 'Address information updated successfully.');
    }

    public function changePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
        ]);

        $userId = auth()->id();

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = User::where("id", "=", $userId)->first();
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route("change_password")->with("message", "Insert Successfull");
        }
    }
}
