<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// panggil model
use App\Models\Porto_model;

class Portofolio extends Controller
{
    /// index
    public function index()
    {

        $m_porto     = new Porto_model();
        $portofolio       = $m_porto->listing();

        $data = [
            'title'     => 'MUA By Jelita - Backend',
            'porto'     => $portofolio,
            'content'   => 'admin/user/index'
        ];
        return view('admin/layout/wrapper', $data);
    }

    // tambah
    public function tambah()
    {

        $data = [
            'title'     => 'Tambah Portofolio',
            'content'   => 'admin/user/tambah'
        ];
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id)
    {
        $m_porto = new Porto_model();
        $portofolio = $m_porto->detail($id);

        $data = [
            'title'   => 'Edit Portofolio',
            'por'     => $portofolio,
            'content' => 'admin/user/edit'
        ];
        return view('admin/layout/wrapper', $data);
    }


    public function proses_tambah(Request $request)
    {
        $request->validate([
            'nama_portofolio' => 'required|string|max:250',
            'gambar_porto'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi'       => 'required|string',
        ]);

        // Handle upload file
        $file = $request->file('gambar_porto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/portofolio'), $filename);

        DB::table('portofolio')->insert([
            'nama_portofolio' => $request->nama_portofolio,
            'gambar_porto'    => $filename,
            'deskripsi'       => $request->deskripsi,
        ]);

        return redirect('admin/user')->with(['sukses' => 'Data portofolio berhasil ditambah']);
    }


    // proses_edit
    public function proses_edit(Request $request)
    {
        $request->validate([
            'nama_portofolio' => 'required|string|max:250',
            'deskripsi'       => 'required|string',
            'gambar_porto'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ambil data lama
        $portofolio = DB::table('portofolio')->where('id', $request->id)->first();

        $filename = $portofolio->gambar_porto; // default pakai gambar lama

        // Kalau user upload gambar baru
        if ($request->hasFile('gambar_porto')) {
            $file = $request->file('gambar_porto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/portofolio'), $filename);

            // Hapus gambar lama kalau ada
            if ($portofolio->gambar_porto && file_exists(public_path('uploads/portofolio/' . $portofolio->gambar_porto))) {
                unlink(public_path('uploads/portofolio/' . $portofolio->gambar_porto));
            }
        }

        DB::table('portofolio')->where('id', $request->id)->update([
            'nama_portofolio' => $request->nama_portofolio,
            'gambar_porto'    => $filename,
            'deskripsi'       => $request->deskripsi,
        ]);

        return redirect('admin/user')->with(['sukses' => 'Data portofolio berhasil diupdate']);
    }

    // delete
    public function delete($id)
    {

        DB::table('portofolio')->where('id', $id)->delete();
        return redirect('admin/user')->with(['sukses' => 'Data portofolio telah dihapus']);
    }
}
