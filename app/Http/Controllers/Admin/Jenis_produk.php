<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// panggil model
use App\Models\Jenis_produk_model;

class Jenis_produk extends Controller
{
    /// index
    public function index()
    {
        
        $m_jenis_produk     = new Jenis_produk_model();
        $jenis_produk       = $m_jenis_produk->listing();

        $data = [   'title'         => 'Jenis Produk',
                    'jenis_produk'  => $jenis_produk,
                    'content'       => 'admin/jenis_produk/index'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah()
    {
        
        $data = [   'title'     => 'Tambah Jenis Produk',
                    'content'   => 'admin/jenis_produk/tambah'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_jenis_produk)
    {
        
        $m_jenis_produk     = new Jenis_produk_model();
        $jenis_produk       = $m_jenis_produk->detail($id_jenis_produk);

        $data = [   'title'         => 'Edit Jenis Produk',
                    'jenis_produk'  => $jenis_produk,
                    'content'       => 'admin/jenis_produk/edit'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // proses_tambah
    public function proses_tambah(Request $request)
    {
        
        request()->validate([
                            'nama_jenis_produk' => 'required|unique:jenis_produk'
                            ]);

        DB::table('jenis_produk')->insert([
            'id_user'               => 1,
            'slug_jenis_produk'     => strtolower(str_replace(' ','-',$request->nama_jenis_produk)),
            'nama_jenis_produk'     => $request->nama_jenis_produk,
            'keterangan'            => $request->keterangan,
            'status_jenis_produk'   => $request->status_jenis_produk,
            'gambar'                => ''
        ]);
        return redirect('admin/jenis-produk')->with(['sukses' => 'Data telah ditambah']);
    }

    // proses_edit
    public function proses_edit(Request $request)
    {
        
        request()->validate([
                            'nama_jenis_produk'  => 'required'
                            ]);

        DB::table('jenis_produk')->where('id_jenis_produk',$request->id_jenis_produk)->update([
            'id_user'               => 1,
            'slug_jenis_produk'     => strtolower(str_replace(' ','-',$request->nama_jenis_produk)),
            'nama_jenis_produk'     => $request->nama_jenis_produk,
            'keterangan'            => $request->keterangan,
            'status_jenis_produk'   => $request->status_jenis_produk,
            'gambar'                => ''
        ]);
        return redirect('admin/jenis-produk')->with(['sukses' => 'Data telah diupdate']);
    }

    // delete
    public function delete($id_jenis_produk)
    {
        
        DB::table('jenis_produks')->where('id_jenis_produk',$id_jenis_produk)->delete();
        return redirect('admin/jenis-produk')->with(['sukses' => 'Data telah diupdate']); 
    }

}
