<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Primary_model;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input, Redirect, Hash, Schema;

class Primary extends Controller
{
    //
    function index(){
        
    }
    
    function pages($template){
        $getAllData = Primary_model::orderBy('username', 'asc')
                            ->get();
        return view($template, ['data_user' => $getAllData]);
    }
    function save(){
        
        $getTable = new Primary_model;
        
        $getTable->username = Input::get('username');
        $getTable->email = Input::get('email');
        $getTable->password = Hash::make(Input::get('password'));
        $getTable->save();
        
        return Redirect::to('home')
                ->with('success','You have been successfully insert data');

    }
    function update(){
        $id = Input::get('id');
        
        $getTable = Primary_model::find($id);
        $getTable->username = Input::get('username');
        $getTable->email = Input::get('email');
        $getTable->password = Hash::make(Input::get('password'));
        $getTable->save();
        
        return Redirect::to('home')
                ->with('success','You have been successfully update data');

    }
    function getdata($id){
        $getData = Primary_model::where('id', $id)
                            ->get();
        
        $getAllData = Primary_model::orderBy('username', 'asc')
                            ->get();
        
        return view('edit', ['get_user' => $getData, 'data_user' => $getAllData]);
    }
    function delete($id){
        
        $return = Primary_model::where('id', $id)
                                ->delete();
        
        return Redirect::to('home')
                ->with('success','You have been successfully deleted data');

    }
    
    function create_tbluser(){
        Schema::create('user',function($table){
            $table->increments('id');
            $table->string('username',100);
            $table->string('email',100);
            $table->string('password',100);
            $table->timestamps();
        });
        
        return 'Tabel user sudah dibuat';
    }
    
}
