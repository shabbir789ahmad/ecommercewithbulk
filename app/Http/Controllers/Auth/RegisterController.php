<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Jobs\WelcomeJob;
class RegisterController extends Controller
{
 

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
         'image' => '',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        $request = app('request');

      if($request->hasfile('image'))

          {
             $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $img= time(). '.' . $ext;
            $file->move('uploads/img/',$img);
          
          }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'image' => $img,
            'user_status' => 1,
            'password' => Hash::make($data['password']),
          ]);

         // $this->job($user->email);
        // return $user;
     }
    public function job($mail)
    {
        
         dispatch(new WelcomeJob($mail));
        
    }
}
