<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'acount_type' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'email' => $data['email'],
            'acount_type' => intval($data['acount_type']),
            'password' => Hash::make($data['password']),
            'suspend' => null,
            'ban' => null
        ]);
        $info = new UserInformation;
        $info->user_id = $user->_id;
        $info->name = $data['name'];
        $info->surname = $data['surname'];
        $info->dob = $data['dob'];
        $info->phone = $data['phone'];
        $info->company_name = $data['company_name'];
        $info->company_code = $data['company_code'];
        $info->address = $data['address'];
        $info->save();
        return $user;
    }
}
