<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    function getAllUsers(){
        $users = User::all();
        return view('admin.index',['users' => $users]);
    }

    function getOneUser($id){
        $user = User::where('id','=',$id)->firstOrFail();
        return view('admin.update',['user' => $user]);
    }

    function update($id, Request $req){
        $user = User::where('id','=',$id)->firstOrFail();
        request()->validate([
            'username' => 'required|max:255',
            'email' => 'required|max:255,email|unique:users,email,'.$user->id,
            ]);

        $user->name = $req->input('username');
        $user->email = $req->input('email');
        if($req->has('role') && !empty($req->input('role'))){
            if($req->input('role') == 'user'){
                $user->setRoles([]);
            }else{
                $user->setRoles([strtoupper($req->input('role'))]);
            }
        }

        $user->save();
        return redirect('/admin');
    }
}