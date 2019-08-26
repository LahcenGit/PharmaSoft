<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $list_user = User::all();
        return view('Dashbord.users',['users' =>$list_user]);

    }

    public function destroy(Request $request, $id){
        $user = User::find($id);
        $user->delete();
        return redirect('Dashbord/users');

    }


    public function designAsAdmin(Request $request, $id){
        
        $user = User::find($id);
        $user->update(['is_admin' => true]);
    
        
        return redirect('Dashbord/users');

    }
}

