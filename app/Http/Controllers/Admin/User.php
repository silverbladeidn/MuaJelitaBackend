<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// panggil model
use App\Models\User_model;

class User extends Controller
{
    /// index
    public function index()
    {
        
        $m_user     = new User_model();
        $user       = $m_user->listing();

        $data = [   'title'     => 'Pengguna Aplikasi',
                    'user'      => $user,
                    'content'   => 'admin/user/index'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah()
    {
        
        $data = [   'title'     => 'Tambah Pengguna Aplikasi',
                    'content'   => 'admin/user/tambah'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_user)
    {
        
        $m_user     = new User_model();
        $user       = $m_user->detail($id_user);

        $data = [   'title'     => 'Edit Pengguna Aplikasi',
                    'user'      => $user,
                    'content'   => 'admin/user/edit'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // proses_tambah
    public function proses_tambah(Request $request)
    {
        
        request()->validate([
                            'username'  => 'required|unique:users',
                            'nama'      => 'required',
                            'password'  => 'required',
                            ]);

        DB::table('users')->insert([
            'nama'          => $request->nama,
            'email'         => $request->email,
            'username'      => $request->username,
            'password'      => sha1($request->password),
            'akses_level'   => $request->akses_level,
            'status_user'   => $request->status_user,
        ]);
        return redirect('admin/user')->with(['sukses' => 'Data telah ditambah']);
    }

    // proses_edit
    public function proses_edit(Request $request)
    {
        
        request()->validate([
                            'username'  => 'required',
                            'nama'      => 'required',
                            'password'  => 'required',
                            ]);

        DB::table('users')->where('id_user',$request->id_user)->update([
            'nama'          => $request->nama,
            'email'         => $request->email,
            'username'      => $request->username,
            'password'      => sha1($request->password),
            'akses_level'   => $request->akses_level,
            'status_user'   => $request->status_user,
        ]);
        return redirect('admin/user')->with(['sukses' => 'Data telah diupdate']);
    }

    // delete
    public function delete($id_user)
    {
        
        DB::table('users')->where('id_user',$id_user)->delete();
        return redirect('admin/user')->with(['sukses' => 'Data telah diupdate']); 
    }

}
