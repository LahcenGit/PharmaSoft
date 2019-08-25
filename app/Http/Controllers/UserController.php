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
}
