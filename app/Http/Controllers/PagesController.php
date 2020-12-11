<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller
{
    //for verification if the user is logged in or not
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function users(){
        $title = "Users";
        $users = User::all();
        return view('pages.users',['title'=>$title,'users'=>$users]);
    }

    public function registerForm() {
        $users = User::all();

        return view('pages.registerAdmin',['users'=>$users]);
    }
    
    public function newRegister(Request $request) {
        //validator
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        if(auth()->user()->controller == '1'){
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $pass = $request->input('password');
            $user->password = Hash::make($pass);
            $user->controller = '0';
            $user->save();

            //flash message
            Session::flash('success', 'User Created Successfully');
            return redirect('/home');
        }
        else{
            //flash message
            Session::flash('danger', 'Access Denied');
            return redirect('/home');
        }
    }

    public function updateUser(Request $request) {
        $id = $request->input('filter_name');
        $change = $request->input('update_name');

        if($id > 0 && $change >= 0){
            $user = User::find($id);
            $user->controller = $change;
            $user->update();
    
            Session::flash('success','Updated Role Successfully');
            return redirect('/home');
        }
        else{
            Session::flash('danger','Select Valid Options');
            return Redirect::back();
        }
    }
}
