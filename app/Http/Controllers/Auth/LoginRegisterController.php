<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginRegisterController extends Controller
{
    public function index()
    {
        return view('admin.akun.index');  // Menampilkan form pendaftaran
    }

    public function create()
    {
        return view('auth.register');  // Menampilkan form pendaftaran
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
        
        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => 'admin'  // Menetapkan usertype default sebagai 'admin'
        ]);

        // Login otomatis setelah pendaftaran
        Auth::login($user);
        $request->session()->regenerate();

        // Mengarahkan sesuai usertype
        return $request->user()->usertype == 'admin'
            ? redirect('admin/dashboard')->with('success', 'You have successfully registered & logged in!')
            : redirect()->intended(route('dashboard'));
    }

    public function login()
    {
        return view('auth.login');  // Menampilkan form login
    }

    public function authenticate(Request $request)
    {
        // Validasi login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial dan login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return $request->user()->usertype == 'admin'
                ? redirect('admin/dashboard')->with('success', 'You have successfully logged in!')
                : redirect()->intended(route('dashboard'));
        }

        // Mengembalikan error jika kredensial tidak valid
        return back()->withErrors(['email' => 'The provided credentials do not match our records.'])
                    ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // Proses logout
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have logged out successfully!');
    }
}
