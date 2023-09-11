<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function showProfile()
    {
        return view('auth.profile');
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

        // Update the user's address fields
        $user->street_address = $request->input('street_address');
        $user->city = $request->input('city');
        $user->postal_code = $request->input('postal_code');
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile information updated successfully.');
    }
}
