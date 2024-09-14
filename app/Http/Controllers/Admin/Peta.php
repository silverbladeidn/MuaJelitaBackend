<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// panggil model
use App\Models\Konsumsi_model;
use App\Models\Jenis_produk_model;
use App\Models\Kota_model;

class Peta extends Controller
{
    // index
    public function index()
    {
        $m_konsumsi         = new Konsumsi_model();
        $m_jenis_produk     = new Jenis_produk_model();
        $m_kota             = new Kota_model();

        if(isset($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
        }else{
            $tahun = date('Y');
        }

        $konsumsi           = $m_konsumsi->tahun($tahun);
        $jenis_produk       = $m_jenis_produk->listing();
        $provinsi           = $m_kota->list_provinsi();
        $listing_tahun      = $m_konsumsi->listing_tahun();

        $data = [   'title'         => 'Peta Konsumsi',
                    'konsumsi'      => $konsumsi,
                    'konsumsi2'     => $konsumsi,
                    'listing_tahun' => $listing_tahun,
                    'tahun'         => $tahun,
                    'provinsi'      => $provinsi,
                    'jenis_produk'  => $jenis_produk,
                    'content'       => 'admin/peta/index'
                ];
        return view('admin/layout/wrapper',$data);
    }
}
