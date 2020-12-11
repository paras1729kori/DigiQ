<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Names;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class QueuesController extends Controller
{
    //for verification if the user is logged in or not
    public function __construct()
    {
        $this->middleware('auth');
    }
    //user defined methods
    public function completed(){
        $title = "Completed Applications";
        $factory = (new Factory)->withServiceAccount(__DIR__.'/digiq-f5f74-firebase-adminsdk-3ewcn-6d963633d4.json');
        $database = $factory->createDatabase();

        //object for reading a db
        $read = $database->getReference('names');

        //reading data from db
        $names = $read->getValue();

        return view('pages.complete',['title'=>$title,'names'=>$names]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/digiq-f5f74-firebase-adminsdk-3ewcn-6d963633d4.json');
        $database = $factory->createDatabase();

        //object for reading a db
        $read = $database->getReference('names');

        //reading data from db
        $names = $read->getValue();
        $title = "Queue";
        // return $names;

        return view('pages.queue',['names'=>$names,'title'=>$title]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/digiq-f5f74-firebase-adminsdk-3ewcn-6d963633d4.json');
        $database = $factory->createDatabase();
        $token = $id;
        //object for reading a db
        $read = $database->getReference('names')->getChild($token);
        // return $read;

        //reading data from db
        $data = $read->getValue();
        // return $data;

        $title = 'Edit';

        return view('pages.edit', ['id'=>$id,'title'=>$title,'data'=>$data,'token'=>$token]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $_POST['name'];
        $application_no = $_POST['application_no'];
        $phone_no = $_POST['phone_no'];
        $email = $_POST['email'];
        $token = $_POST['token'];
        $time = 0;

        if($request->input('form_fill') == '1'){
            $form_fill = '1';
            $time = $time + 5;
        }
        else{
            $form_fill = '0';
        }
        if($request->input('verified') == '1'){
            $verified = '1';
            $time = $time + 5;
        }
        else{
            $verified = '0';
        }
        if($request->input('file_created') == '1'){
            $file_created = '1';
            $time = $time + 5;
        }
        else{
            $file_created = '0';
        }
        if($request->input('payment') == '1'){
            $payment = '1';
            $time = $time + 5;
        }
        else{
            $payment = '0';
        }
        if($request->input('email_create') == '1'){
            $email_create = '1';
            $time = $time + 5;
        }
        else{
            $email_create = '0';
        }
        $time_rem = 25 - $time;

        $data = [
            'name' => $name,
            'application_no' => $application_no,
            'phone_no' => $phone_no,
            'email' => $email,
            'form_fill' => $form_fill,
            'verified' => $verified,
            'file_created' => $file_created,
            'payment' => $payment,
            'email_create' => $email_create,
            'time_rem' => $time_rem
        ];

        $factory = (new Factory)->withServiceAccount(__DIR__.'/digiq-f5f74-firebase-adminsdk-3ewcn-6d963633d4.json');
        $database = $factory->createDatabase();
        $ref = 'names/'.$token;
        $read = $database->getReference($ref)->update($data);

        Session::flash('success','Details Updated Successfully');
        return redirect('/queue');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $token = $id;

        $factory = (new Factory)->withServiceAccount(__DIR__.'/digiq-f5f74-firebase-adminsdk-3ewcn-6d963633d4.json');
        $database = $factory->createDatabase();
        $ref = 'names/'.$token;
        $read = $database->getReference($ref)->remove();
        
        Session::flash('success','User Deleted Successfully');
        return redirect('/queue');
    }
}
