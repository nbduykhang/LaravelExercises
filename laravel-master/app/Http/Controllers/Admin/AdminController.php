<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Hash;
class AdminController extends Controller
{
   	public function index(){
   		return view('admin.dashboard');
   	}

   	public function profile(){
   		return view('admin.user.profile');
   	}

   	public function editProfile(Request $req){
   		$profile = User::find(Auth::user()->id);
   		$profile->first_name = $req->firstnameProfile;
   		$profile->last_name = $req->lastnameProfile;
   		$profile->username = $req->usernameProfile;
   		$profile->phone = $req->phoneProfile;
   		$profile->save();
   	}

   	public function getChangePassword(){
   		return view('admin.user.change-password');
   	}

   	public function postChangePassword(Request $req){
   		$user = User::find(Auth::user()->id);
   		$currentPass = Hash::make($req->userOldpass);
   		if (Hash::check($user->password, $currentPass)) {
    		$user->password = Hash::make($req->userNewpass);
    		$user->save();
		} else {
			echo Hash::make($req->userOldpass).'<br>'.$user->password;
		}
   	}

}
