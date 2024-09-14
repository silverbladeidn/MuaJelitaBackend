<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// paginator untuk paginasi
use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();
// panggil model
use App\Models\Konsumsi_model;
use App\Models\Jenis_produk_model;
use App\Models\Kota_model;
use App\Models\Konfigurasi_model;

class Konsumsi extends Controller
{
    /// index
    public function index()
    {

        $m_konsumsi         = new Konsumsi_model();
        $m_jenis_produk     = new Jenis_produk_model();
        $m_kota             = new Kota_model();
        $m_konfigurasi      = new Konfigurasi_model();

        $konfigurasi        = $m_konfigurasi->listing();

        if (isset($_GET['keywords'])) {
            $keywords   = strip_tags($_GET['keywords']);
            $konsumsi   = $m_konsumsi->paginasi_cari($keywords, $konfigurasi->paginasi);
        } else {
            $konsumsi   = $m_konsumsi->paginasi($konfigurasi->paginasi);
        }

        $jenis_produk       = $m_jenis_produk->listing();
        $provinsi           = $m_kota->list_provinsi();

        $data = [
            'title'                 => 'Konsumsi Produk',
            'konsumsi'              => $konsumsi,
            'konsumsi_pagination'   => $konsumsi,
            'provinsi'              => $provinsi,
            'jenis_produk'          => $jenis_produk,
            'm_jenis_produk'        => $m_jenis_produk,
            'm_kota'                => $m_kota,
            'content'               => 'admin/konsumsi/index'
        ];
        return view('admin/layout/wrapper', $data);
    }

    // all
    public function all()
    {
        $m_konsumsi         = new Konsumsi_model();
        $m_jenis_produk     = new Jenis_produk_model();
        $m_kota             = new Kota_model();
        $m_konfigurasi      = new Konfigurasi_model();
        $jenis_produk       = $m_jenis_produk->listing();
        $provinsi           = $m_kota->list_provinsi();

        $data = [
            'title'                 => 'Data Konsumsi Produk Full One Page',
            'provinsi'              => $provinsi,
            'jenis_produk'          => $jenis_produk,
            'm_jenis_produk'        => $m_jenis_produk,
            'm_kota'                => $m_kota,
            'provinsi2'             => $provinsi,
            'jenis_produk2'         => $jenis_produk,
            'content'               => 'admin/konsumsi/all'
        ];
        return view('admin/layout/wrapper', $data);
    }

    // data
    public function data()
    {
        $m_konsumsi = new Konsumsi_model();

        if (isset($_GET['keywords'])) {
            $keywords   = strip_tags($_GET['keywords']);
            $konsumsi   = $m_konsumsi->pencarian($keywords);
        } else {
            $konsumsi   = $m_konsumsi->listing();
        }
        echo json_encode($konsumsi);
    }

    // tambah
    public function tambah()
    {
        $data = [
            'title'     => 'Tambah Jenis Produk',
            'content'   => 'admin/konsumsi/tambah'
        ];
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_konsumsi)
    {

        $m_konsumsi     = new Konsumsi_model();
        $m_jenis_produk = new Jenis_produk_model();
        $m_kota         = new Kota_model();

        $konsumsi       = $m_konsumsi->detail($id_konsumsi);
        $jenis_produk   = $m_jenis_produk->listing();
        $provinsi       = $m_kota->list_provinsi();
        $kota           = $m_kota->detail($konsumsi->kode);

        $data = [
            'title'         => 'Edit Konsumsi Produk',
            'konsumsi'      => $konsumsi,
            'provinsi'      => $provinsi,
            'jenis_produk'  => $jenis_produk,
            'kota'          => $kota,
            'content'       => 'admin/konsumsi/edit'
        ];
        return view('admin/layout/wrapper', $data);
    }

    // proses_tambah
    public function proses_tambah(Request $request)
    {

        request()->validate([
            'kode'              => 'required',
            'id_jenis_produk'   => 'required',
            'tahun'             => 'required',
            'jumlah'            => 'required'
        ]);

        $jumlah = str_replace('.', '', $request->jumlah);

        DB::table('konsumsi')->insert([
            'id_user'           => Session()->get('id_user'),
            'kode'              => $request->kode,
            'id_jenis_produk'   => $request->id_jenis_produk,
            'tahun'             => $request->tahun,
            'jumlah'            => $jumlah,
            'keterangan'        => $request->keterangan,
            'status_konsumsi'   => $request->status_konsumsi
        ]);
        return redirect('admin/konsumsi')->with(['sukses' => 'Data telah ditambah']);
    }

    // proses_add
    public function proses_add(Request $request)
    {

        request()->validate([
            'kode'              => 'required',
            'id_jenis_produk'   => 'required',
            'tahun'             => 'required',
            'jumlah'            => 'required'
        ]);

        $jumlah = str_replace('.', '', $request->jumlah);

        DB::table('konsumsi')->insert([
            'id_user'           => Session()->get('id_user'),
            'kode'              => $request->kode,
            'id_jenis_produk'   => $request->id_jenis_produk,
            'tahun'             => $request->tahun,
            'jumlah'            => $jumlah,
            'keterangan'        => $request->keterangan,
            'status_konsumsi'   => $request->status_konsumsi
        ]);
        return redirect('admin/konsumsi/all')->with(['sukses' => 'Data telah ditambah']);
    }

    // proses_edit
    public function proses_edit(Request $request)
    {

        request()->validate([
            'kode'              => 'required',
            'id_jenis_produk'   => 'required',
            'tahun'             => 'required',
            'jumlah'            => 'required'
        ]);
        $jumlah = str_replace('.', '', $request->jumlah);

        DB::table('konsumsi')->where('id_konsumsi', $request->id_konsumsi)->update([
            'id_user'           => Session()->get('id_user'),
            'kode'              => $request->kode,
            'id_jenis_produk'   => $request->id_jenis_produk,
            'tahun'             => $request->tahun,
            'jumlah'            => $jumlah,
            'keterangan'        => $request->keterangan,
            'status_konsumsi'   => $request->status_konsumsi
        ]);
        return redirect('admin/konsumsi')->with(['sukses' => 'Data telah diupdate']);
    }

    // delete
    public function delete($id_konsumsi)
    {

        DB::table('konsumsi')->where('id_konsumsi', $id_konsumsi)->delete();
        return redirect('admin/konsumsi')->with(['sukses' => 'Data telah dihapus']);
    }

    // hapus
    public function hapus($id_konsumsi)
    {
        DB::table('konsumsi')->where('id_konsumsi', $id_konsumsi)->delete();
        return redirect('admin/konsumsi/all')->with(['sukses' => 'Data telah dihapus']);
    }

    // get_kabupaten
    public function get_kabupaten()
    {
        $m_kota             = new Kota_model();
        $kode               = $_GET['kode_provinsi'];
        $kabupaten          = $m_kota->list_kabupaten($kode);
        echo '<option value="">Pilih kabupaten</option>';
        foreach ($kabupaten as $kabupaten) {
            echo '<option value="' . $kabupaten->kode . '">' . $kabupaten->nama . '</option>';
        }
    }
}
