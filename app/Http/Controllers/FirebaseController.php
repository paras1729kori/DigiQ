<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
	public function index(){
        //for making a connection with the firebase
        $factory = (new Factory)->withServiceAccount(__DIR__.'/digiq-f5f74-firebase-adminsdk-3ewcn-6d963633d4.json');

        //object for creating a child
        $create = $factory->createDatabase();
       
        $data = [
            'name' => "Arron Stone",
            'application_no' => "86513213213",
            'phone_no' => "9876543210",
            'email' => "stud@two.com",
            'form_fill' => '0',
            'verified' => '0',
            'file_created' => '0',
            'payment' => '0',
            'email_create' => '0'
        ];

        //making a new child
		$newPost = $create->getReference('names')->push($data);
        echo "Done";        
    }
    
    public function usersView(){
        $factory = (new Factory)->withServiceAccount(__DIR__.'/digiq-f5f74-firebase-adminsdk-3ewcn-6d963633d4.json');
        $database = $factory->createDatabase();

        //object for reading a db
        $read = $database->getReference('users');

        //reading data from db
        $user_names = $read->getValue();
        $users = [];
        for($i=1; $i<count($user_names); $i++){
            array_push($users,$user_names[$i]);
        }
        $title = "Users";
        // return $users;

        return view('pages.users',['users'=>$users,'title'=>$title]);
    }
}

?>