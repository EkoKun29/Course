<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
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

    public function create(){
        return view('auth.register');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048', // validasi untuk file gambar
        ]);
    
        // Generate UUID untuk gambar
        $imageUUID = Str::uuid()->toString();
    
        // Simpan gambar ke direktori yang diinginkan dengan nama UUID dan ekstensi yang sesuai
        $image = $request->file('image');
        $image->move(public_path('images'), $imageUUID . '.' . $image->getClientOriginalExtension());
    
        // Simpan informasi pengguna beserta UUID gambar ke basis data
        $register = new User();
        $register->name = $request->nama;
        $register->email = $request->email;
        $register->password = Hash::make($request->password);
        $register->role = "user";
        $register->image = $imageUUID; // Simpan UUID gambar dengan ekstensi
        $register->save();
    
        return redirect()->back()->with('success', 'Akun Anda Berhasil Dibuat');
    }
    
    
    
    
    

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

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
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}
