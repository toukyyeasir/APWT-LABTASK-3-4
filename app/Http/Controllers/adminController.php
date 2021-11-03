<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class adminController extends Controller
{
    //
    function addAdmin(Request $req)
    {
        $admin = new Admin;

        $req->validate([
            'name' => 'required|max:30',
            'phone_number' => 'required',
            'email' => 'required|max:30',
            'address' => 'required|max:120',
            'dob' => 'required',
            'password' => 'required|min:8|max:30',

        ]);

        $admin->name = $req->name;
        $admin->phone_number = $req->phone_number;
        $admin->email = $req->email;
        $admin->address = $req->address;
        $admin->dob = $req->dob;
        $admin->password = $req->password;
        $admin->save();

        $data = $req->name;
        $req->session()->flash('user',$data);
        return redirect ('login_admin');
    }
}
