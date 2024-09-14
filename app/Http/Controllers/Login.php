<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// panggil model
use App\Models\User_model;

class Login extends Controller
{
    // index
    public function index()
    {
        $data = [   'title'     => 'Halaman Login',
                    'content'   => 'login/index'
                ];
        return view('login/wrapper',$data);
    }

    // proses login
    public function proses(Request $request)
    {
        $m_user     = new User_model();
        $username   = $request->username;
        $password   = $request->password;
        $user       = $m_user->login($username,$password);
        // check username dan password
        if($user) 
        {
            if($user->status_user=='Aktif') 
            {
                $request->session()->put('id_user', $user->id_user);
                $request->session()->put('nama', $user->nama);
                $request->session()->put('username', $user->username);
                $request->session()->put('akses_level', $user->akses_level);
                $request->session()->put('status_user', $user->status_user);
                return redirect('admin/dasbor')->with(['sukses' => 'Anda berhasil login']);
            }else{
                return redirect('login')->with(['warning' => 'Anda tidak bisa login. Akun Anda tidak aktif']);
            }
        }else{
            return redirect('login')->with(['warning' => 'Anda gagal login. Username atau password salah.']);
        }
    }

    // logout
    public function logout()
    {
        // proses logout
        Session()->forget('id_pegawai');
        Session()->forget('username');
        Session()->forget('nama');
        Session()->forget('akses_level');
        Session()->forget('status_user');
        // logout end
        return redirect('login')->with(['sukses' => 'Anda berhasil logout.']);
    }

    // lupa
    public function lupa()
    {
        $data = [   'title'     => 'Lupa Password',
                    'content'   => 'login/lupa'
                ];
        return view('login/wrapper',$data);
    }
}
