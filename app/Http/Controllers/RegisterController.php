<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class RegisterController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('AuthPage.regis', compact('roles'));
    }

    public function regisdb(Request $request){

        $validatedData = $request->validate([
            'first_name' => 'required|max:25|alphanum',
            'last_name' => 'required|max:25|alphanum',
            'gender' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:20|regex:/(?=[a-zA-Z]*[0-9])/',
            'confirm_password' => 'required|required_with:password|same:password',
            'display_picture' => 'required|image',
            'role' => 'required',
        ]);

        $extension = $request->file('display_picture')->getClientOriginalExtension();
        $fileName = $request->email.'.'.$extension;
        $request->file('display_picture')->storeAs('public/users/', $fileName);

        // dd($fileName);

        $request['password'] = bcrypt($validatedData['password']);
        $request->session()->flash('SignUpSuccess', 'Sign Up Successful');
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender_id' => $request->gender,
            'email' => $request->email,
            'password' => $request->password,
            'display_picture' => $fileName,
            'role_id' => $request->role,

        ]);
        return redirect(route('landing'));

    }
}
