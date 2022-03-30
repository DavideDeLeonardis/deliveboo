<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        $parameters = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'numeric', 'digits_between:10,11', 'unique:users'],
            'p_iva' => ['required', 'numeric', 'digits_between:11,11', 'unique:users'],
        ];

        $messages = [
            'name.required' => 'Il nome è richiesto',
            'email.required' => 'L\'email è richiesta',
            'phone.numeric' => 'Il numero di telefono deve contenere solo numeri',
            'phone.unique' => 'Il numero di telefono è già registrato',
            'email.unique' => 'L\'email è già registrata',
            'p_iva.unique' => 'La partita iva è già registrata',
            'phone.digits_between' => 'Il numero di telefono deve contenere fra i :min e i :max caratteri',
            'p_iva.digits_between' => 'La partita iva deve contenere :max caratteri',
            'password.required' => 'La password è richiesta',
            'password.confirmed' => 'Le due password non corrispondono',
            'password.min' => 'La password deve contenere minimo :min caratteri',
        ];

        return Validator::make($data, $parameters, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function showRegistrationForm()
    {
        $categories = Category::all();
        return view('auth.register', ['categories' => $categories]);
    }
    
    protected function create(array $data)
    {

        function createSlug($name)
        {
            $slug = Str::slug($name, '-');

            $oldUser = User::where('slug', $slug)->first();

            $counter = 0;
            while ($oldUser) {
                $newSlug = $slug . '-' . $counter;
                $oldUser = User::where('slug', $newSlug)->first();
                $counter++;
            }

            return (empty($newSlug)) ? $slug : $newSlug;
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone'],
            'p_iva' => $data['p_iva'],
            'slug' => createSlug($data['name']),
        ]);
    }
}
