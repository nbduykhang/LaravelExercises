<?php

namespace App\Http\Controllers\CustomAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\CustomRequest;
use App\Http\Requests\LoginRequest;
use Hash;
use Auth;

class AuthController extends Controller
{
	public function getRegister(){
		return view('admin.auth.register');
	}
  	public function postRegister(CustomRequest $req){
  		$user= new User;
  		$user->first_name = $req->firstnameRegister;
  		$user->last_name = $req->lastnameRegister;
  		$user->username = $req->usernameRegister;
  		$user->email= $req->emailRegister;
  		$user->phone= $req->phoneRegister;
  		$user->password = Hash::make($req->passwordRegister);
  		$user->save();
  		return redirect()->route('getLogin');
  	}

  	public function getLogin(){
		return view('admin.auth.login');
	}
	public function postLogin(LoginRequest $req){
		$data=[
    		'email'=>$req->emailLogin,
    		'password'=>$req->passwordLogin,
    		'status'=>1
    	];
    	if(Auth::attempt($data)){
    		return redirect()->route('getAdmin');
    	} else {
    		return redirect()->back();
    	}
	}

	/*public function getAnotherLogin($email, $password, $status){
		$data=[
    		'email'=>$email,
    		'password'=>$password,
    		'status'=>$status
    	];
    	if(Auth::attempt($data)){
    		return redirect()->route('getAdmin');
    	} else {
    		return redirect()->back();
    	}
	}*/
}
