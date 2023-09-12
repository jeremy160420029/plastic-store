<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        $customer = User::all()->where('role', 'buyer');
        $admin = User::all()->where('role', 'admin');
        return view('admin.user.admincustomer', compact('customer', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = User::where("email", "=", $request->email)->first();
        if ($email) {
            return back()->withInput()->with("message", "Sudah ada");
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone_number' => ['required', 'min:10', 'max:13'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone_number = $request->phone_number;
            $user->street_address = $request->street_address;
            $user->city = $request->city;
            $user->postal_code = $request->postal_code;
            $user->role = "admin";
            $user->save();
            return redirect()->route("admuser.index")->with("message", "Insert Successfull");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    public function updateAdmCust(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => ['required', 'min:10', 'max:13'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = User::where("id", "=", $id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone_number = $request->phone_number;
            $user->street_address = $request->street_address;
            $user->city = $request->city;
            $user->postal_code = $request->postal_code;
            $user->save();
            return redirect()->route("admuser.index")->with("message", "Insert Successfull");
        }
    }

    public function updateAdmStaff(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8'],
            'phone_number' => ['required', 'min:10', 'max:13'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = User::where("id", "=", $id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone_number = $request->phone_number;
            $user->street_address = $request->street_address;
            $user->city = $request->city;
            $user->postal_code = $request->postal_code;
            $user->save();
            return redirect()->route("admuser.index")->with("message", "Insert Successfull");
        }
    }

    public function updateCust($id)
    {
        $cust = User::where("id", "=", $id)->first();
        return view('admin.user.updatecust', ['cust' => $cust]);
    }

    public function updateAdm($id)
    {
        $admin = User::where("id", "=", $id)->first();
        return view('admin.user.updateadm', ['admin' => $admin]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function deleteData(Request $request)
    {
        $id = $request->get('id');
        $data = User::find($id);
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Kategori berhasil di hapus'
        ), 200);
    }
}
