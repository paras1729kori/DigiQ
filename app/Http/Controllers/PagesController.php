<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
    
}
