<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    function update($id, Request $req){
        $user = User::where('id','=',$id)->firstOrFail();
        request()->validate([
            'username' => 'required|max:255',
            'email' => 'required|max:255,email|unique:users,email,'.$user->id,
            'password' => 
                'nullable',
                'min:8',  
            ]);
        $email = User::where('email','=',$req->input('email'));
        
        $user->name = $req->input('username');
        $user->email = $req->input('email');

        if($req->has('password') && !empty($req->input('password'))){
            $user->password = Hash::make($req->get('password'));
        }
        $user->save();
        $req->session()->flash('data','Profil correctly updated');
     
        return redirect('/user/update');
    }

    function delete($id){
        $user = User::where('id','=',$id)->firstOrFail();
        $user->delete();
        return redirect('/admin');
    }

    function getUserUpdate(){
        $user = auth()->user();
        return view('user.update',['user' => $user]);
    }
}
