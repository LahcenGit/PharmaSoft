<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Image;
use Auth;
Use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        if(Auth::user()->is_admin){
        $list_user = User::all();
        }
        else{
            $list_user = User::where('id',Auth::user()->id)->get();
        }
        
        
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
    
    public function desiableAdmin(Request $request, $id){
        
        $user = User::find($id);
        $user->update(['is_admin' => false]);
        return redirect('Dashbord/users');

    }

    public function edit($id){
        $user = User::find($id);

        //$this->authorize('update', $user);
        return view('Dashbord.edituser',['user' => $user]);
    }

    public function update(userRequest $request , $id){
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');
        $user->date_nais = $request->input('date_nais');
        $user->telephone = $request->input('telephone');
        
        /*if ($user->avatar !== 'avatar.png') {
            $file = public_path('uploads/avatars/' . $user->avatar);

            if (File::exists($file)) {
                unlink($file);
            }

        }*/
        
        $avatar = $request->file('photo');
    	$filename = time() . '.' . $avatar->getClientOriginalExtension();
    	Image::make($avatar)->resize(300, 300)->save( public_path('/storage/image/' . $filename ) );
    	$user->photo = $filename;
        
        $user->save();

        return redirect('Dashbord/users');

    }
}

