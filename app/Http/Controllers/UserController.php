<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function list(){
   $data=array();
   $data['userName']='nurnaby';
   $data['role']=23;
      
    return view('user-list',$data);
   }
}