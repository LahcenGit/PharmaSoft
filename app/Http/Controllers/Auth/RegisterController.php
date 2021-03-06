<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Image;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   //protected $redirectTo = '/home';
   public function redirectTo(){
        
    // User role
   // $role = Auth::user()->role->name; 
    
   /* // Check user role
    switch ($role) {
        case 'Manager':
                return '/dashboard';
            break;
        case 'Employee':
                return '/projects';
            break; 
        default:
                return '/login'; 
            break;
            }*/
            return '/Dashbord/users';
    

}
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */


     // Important : illimination de la methode pour pouvopir faire l'inscription manuelle des users
    /*public function __construct()
    {
        $this->middleware('guest');
    }**/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
           'name' => ['required', 'string', 'max:255'],        
           'prenom' => ['required', 'string' , 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'password' => ['required', 'string', 'min:8', 'confirmed'],
           'date_nais' => ['required','string'],
           'telephone' => ['required','string','max:255'],
           'photo' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data )
    {
        $request = Request();
        

        $avatar = $request->file('photo');
    	$filename = time() . '.' . $avatar->getClientOriginalExtension();
    	Image::make($avatar)->resize(300, 300)->save( public_path('/storage/image/' . $filename ) );
    	 
       
        return User::create([
            'name' => $data['name'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'date_nais' => $data['date_nais'],
            'telephone' => $data['telephone'],
            'photo' => $filename,
            
        ]);

       
    }
}
