<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\History;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


    
class AuthController extends Controller
{
    // Metode untuk menampilkan formulir login
  
    // Metode untuk menangani proses login
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $history = History::create([
                'action' => "User Login",
                'table_name' => "Tabel User",
                'user_id' => auth()->user()->id,
                'data_id' => '0',
                'action_time' => Carbon::now()
            ]);
        
            $history->save();
            return redirect('/dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        $history = History::create([
            'action' => "User Logout",
            'table_name' => "Tabel User",
            'user_id' => auth()->user()->id,
            'data_id' => '0',
            'action_time' => Carbon::now()
        ]);
    
        $history->save();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        

        return redirect('/');
    }

    public function register(Request $request)
    {
        // Validasi formulir pendaftaran
        $request->validate([
            'name'          => 'required|string|max:255|unique:users',
            'email'         => 'required|email:dns|unique:users',
            'prodi'         => 'required|string|max:255',
            'universitas'   => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'password'      => 'required|min:6|confirmed',
        ]);

        $token = Str::random(10);
    
        // Membuat pengguna baru
        $newUser = User::create([
            'name'          => $request->input('name'),
            'email'         => $request->input('email'),
            'prodi'         => $request->input('prodi'),
            'universitas'   => $request->input('universitas'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'is_admin'      => 0,
            'remember_token'=> $token,
            'password'      => bcrypt($request->input('password')),
        ]);

        $history = History::create([
            'action' => "User Register",
            'table_name' => "Tabel User",
            'user_id' => $newUser->id,
            'data_id' => '0',
            'action_time' => Carbon::now()
        ]);
    
        $history->save();

        // Redirect ke halaman login setelah pendaftaran
        return redirect('/login')->with('success', ['Pembuatan Akun Anda Sudah Berhasil...',$token]);
    }

    public function changePassword(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();


        $request->validate([
            'email'         => 'required|email',
            'old_password'  => 'required|min:6',
            'password'      => 'required|min:6|confirmed',
        ]);

        if ($request->input('email') == $user->email && Hash::check($request->input('old_password'), $user->password)) {
            // Mengganti password dengan password baru yang di-hash
            $user->password = Hash::make($request->input('password'));
            $user->save();

            $history = History::create([
                'action' => "User Ganti Password",
                'table_name' => "Tabel User",
                'user_id' => auth()->user()->id,
                'data_id' => '0',
                'action_time' => Carbon::now()
            ]);
        
            $history->save();
    
            return redirect('/profile')->with('success', 'Ubah Password Akun Anda Sudah Berhasil...');
        }
    }

    public function recoveryPassword(Request $request) {
        $users = User::all();

        $request->validate([
            'email'         => 'required|email',
            'token'         => 'required|string',
            'tanggal_lahir' => 'required|date',
            'password'      => 'required|min:6|confirmed',
        ]);
        $token = Str::random(10);
        foreach($users as $user) {
            if ($request->input('email') == $user->email 
                && $request->input('token') == $user->remember_token
                && $request->input('tanggal_lahir') == $user->tanggal_lahir) {
                $user->remember_token = $token;
                $user->password = Hash::make($request->input('password'));
                $user->save();

                return redirect('/login')->with('success', ['Recovery Password Anda Sudah Berhasil...',$token]);

            }
        }

        

    }
}

