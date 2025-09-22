<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login", [
            "title" => "Login",
        ]);
    }

    public function login_post(Request $request)
    {
        if (Auth::attempt($request->only(["email", "password"]))) {
            // return redirect()->route("admin.dashboard");
            return redirect()->route("admin.profil-perusahaan.index");
        } else {
            return back()->with("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => "Email atau password salah",
            ]);
        }
    }

    public function pendaftaran()
    {
        return view("auth.register", [
            "title" => "Pendaftaran",
        ]);
    }

    public function register_post(Request $request)
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "password" => bcrypt($request->password),
            "role" => "user",
        ]);

        Auth::login($user);
        return redirect()->route("home");
    }

    public function change_password()
    {
        return view("auth.change-password", [
            "title" => "Ganti Password",
        ]);
    }

    public function change_password_post(Request $request)
    {
        $request->validate([
            "password_old" => "required|current_password",
            "password" => "required|confirmed",
        ], [
            "password_old.current_password" => "Password lama salah",
            "password.confirmed" => "Password tidak sama",
        ]);

        $user = User::find(Auth::user()->id);
        $user->update([
            "password" => bcrypt($request->password)
        ]);

        return redirect()->back()->with("notification", [
            "icon" => "success",
            "title" => "Sukses",
            "text" => "Password berhasil diubah",
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }
}
