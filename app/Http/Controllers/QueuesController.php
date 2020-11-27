<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Names;

class QueuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Queue";
        $names = Names::all();
        return view('pages.queue',['title'=>$title, 'names'=>$names]);
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
        $title = 'Edit';
        $id = $id;
        $data = Names::find($id);
        return view('pages.edit', ['id'=>$id,'title'=>$title,'data'=>$data]);
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
        $row = Names::find($id);
        $form_fill = $request->form_fill;
        $verified = $request->verified;
        $file_created = $request->file_created;
        $payment = $request->payment;
        $email_create = $request->email_create;

        if($form_fill == 1){
            $row->form_fill = '1';
        }
        else{
            $row->form_fill = '0';
        }
        if($verified == 1){
            $row->verified = '1';
        }
        else{
            $row->verified = '0';
        }
        if($file_created == 1){
            $row->file_created = '1';
        }
        else{
            $row->file_created = '0';
        }
        if($payment == 1){
            $row->payment = '1';
        }
        else{
            $row->payment = '0';
        }
        if($email_create == 1){
            $row->email_create = '1';
        }
        else{
            $row->email_create = '0';
        }
        $row->save();
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
        $name = Names::find($id);
        $name->delete();
        Session::flash('success','User Deleted Successfully');
        return redirect('/queue');
    }
}
