<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AccountController extends Controller
{
    public function index(){

        $user = auth()->user();

        $profile = User::find($user->id);

        // $roles = Role::all();

        // dd($profile);
        return view('HomePage.profile', compact('profile'));

    }

    public function update(Request $request){

        $validatedData = $request->validate([
            'first_name' => 'required|max:25|alphanum',
            'last_name' => 'required|max:25|alphanum',
            'gender' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:20|regex:/(?=[a-zA-Z]*[0-9])/',
            'confirm_password' => 'required|required_with:password|same:password',
            'display_picture' => 'image',
        ]);

        if($request->file('display_picture')){
            $extension = $request->file('display_picture')->getClientOriginalExtension();
            $fileName = $request->email.'.'.$extension;
            $request->file('display_picture')->storeAs('public/users/', $fileName);

            // dd($fileName);

            $request['password'] = bcrypt($validatedData['password']);
            $request->session()->flash('UpdateSuccess', 'Update Profile Successful');
            $user = auth()->user();
            User::findOrFail($user->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender_id' => $request->gender,
                'email' => $request->email,
                'password' => $request->password,
                'display_picture' => $fileName,
            ]);
        }else{
            $request['password'] = bcrypt($validatedData['password']);
            $request->session()->flash('UpdateSuccess', 'Update Profile Successful');
            $user = auth()->user();
            User::findOrFail($user->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender_id' => $request->gender,
                'email' => $request->email,
                'password' => $request->password,
            ]);
        }
        return redirect(route('finishprofile'));
    }

    public function success(){

        return view('HomePage.saved');
    }

    public function adminPage(){

        $users = User::all();

        return view('Admin.accountmaintenance', compact('users'));
    }

    public function editRole($locale,$id){
        $user = User::find($id);
        $roles = Role::all();

        return view('Admin.updaterole', compact('user', 'roles'));
    }

    public function updaterole($id, Request $request){
        User::find($id)->update([
            'role_id' => $request->role
        ]);
        return redirect(route('accmaintain', ['locale' => session('locale')]))
        ->with('updtrl', __('Success Update Role'));
    }

    public function deleteUser($id){
        User::destroy($id);

        return back()->with('DeleteUser', __('Success Delete Account'));
    }
}
