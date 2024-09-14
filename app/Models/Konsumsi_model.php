<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Konsumsi_model extends Model
{
    use HasFactory;

    // listing
    public function listing()
    {
        $query = DB::table('konsumsi')
            ->select('konsumsi.*',
                    'jenis_produk.nama_jenis_produk',
                    'jenis_produk.slug_jenis_produk',
                    'kota.nama AS nama_kota',
                    'kota.lat',
                    'kota.lng',
                    'kota.ibukota',
                    'users.nama'
                    )
            ->join('jenis_produk','jenis_produk.id_jenis_produk','=','konsumsi.id_jenis_produk','LEFT')
            ->join('kota','kota.kode','=','konsumsi.kode','LEFT')
            ->join('users','users.id_user','=','konsumsi.id_user','LEFT')
            ->orderBy('konsumsi.id_konsumsi','DESC')
            ->get();
        return $query;
    }

    // paginasi
    public function paginasi($paginasi)
    {
        $query = DB::table('konsumsi')
            ->select('konsumsi.*',
                    'jenis_produk.nama_jenis_produk',
                    'jenis_produk.slug_jenis_produk',
                    'kota.nama AS nama_kota',
                    'kota.lat',
                    'kota.lng',
                    'kota.ibukota',
                    'users.nama'
                    )
            ->join('jenis_produk','jenis_produk.id_jenis_produk','=','konsumsi.id_jenis_produk','LEFT')
            ->join('kota','kota.kode','=','konsumsi.kode','LEFT')
            ->join('users','users.id_user','=','konsumsi.id_user','LEFT')
            ->orderBy('konsumsi.id_konsumsi','DESC')
            ->paginate($paginasi);
        return $query;
    }

    // paginasi_cari
    public function paginasi_cari($keywords,$paginasi)
    {
        $query = DB::table('konsumsi')
            ->select('konsumsi.*',
                    'jenis_produk.nama_jenis_produk',
                    'jenis_produk.slug_jenis_produk',
                    'kota.nama AS nama_kota',
                    'kota.lat',
                    'kota.lng',
                    'kota.ibukota',
                    'users.nama'
                    )
            ->join('jenis_produk','jenis_produk.id_jenis_produk','=','konsumsi.id_jenis_produk','LEFT')
            ->join('kota','kota.kode','=','konsumsi.kode','LEFT')
            ->join('users','users.id_user','=','konsumsi.id_user','LEFT')
            // where
            ->where(function ($query) use ($keywords) {
                $query->where('kota.nama', 'like', '%' . $keywords . '%')
                    ->orWhere('kota.ibukota', 'like', '%' . $keywords . '%')
                    ->orWhere('jenis_produk.nama_jenis_produk', 'like', '%' . $keywords . '%');
            })
            // end where
            ->orderBy('konsumsi.id_konsumsi','DESC')
            ->paginate($paginasi);
        return $query;
    }

     // pencarian
     public function pencarian($keywords)
     {
         $query = DB::table('konsumsi')
             ->select('konsumsi.*',
                     'jenis_produk.nama_jenis_produk',
                     'jenis_produk.slug_jenis_produk',
                     'kota.nama AS nama_kota',
                     'kota.lat',
                     'kota.lng',
                     'kota.ibukota',
                     'users.nama'
                     )
             ->join('jenis_produk','jenis_produk.id_jenis_produk','=','konsumsi.id_jenis_produk','LEFT')
             ->join('kota','kota.kode','=','konsumsi.kode','LEFT')
             ->join('users','users.id_user','=','konsumsi.id_user','LEFT')
             // where
             ->where(function ($query) use ($keywords) {
                 $query->where('kota.nama', 'like', '%' . $keywords . '%')
                     ->orWhere('kota.ibukota', 'like', '%' . $keywords . '%')
                     ->orWhere('jenis_produk.nama_jenis_produk', 'like', '%' . $keywords . '%');
             })
             // end where
             ->orderBy('konsumsi.id_konsumsi','DESC')
             ->get();
         return $query;
     }

    // tahun
    public function tahun($tahun)
    {
        $query = DB::table('konsumsi')
            ->select('konsumsi.*',
                    'jenis_produk.nama_jenis_produk',
                    'jenis_produk.slug_jenis_produk',
                    'kota.nama AS nama_kota',
                    'kota.ibukota',
                    'kota.lat',
                    'kota.lng',
                    'users.nama'
                    )
            ->join('jenis_produk','jenis_produk.id_jenis_produk','=','konsumsi.id_jenis_produk','LEFT')
            ->join('kota','kota.kode','=','konsumsi.kode','LEFT')
            ->join('users','users.id_user','=','konsumsi.id_user','LEFT')
            ->where('konsumsi.tahun',$tahun)
            ->orderBy('konsumsi.id_konsumsi','DESC')
            ->get();
        return $query;
    }

    // listing_tahun
    public function listing_tahun()
    {
         $query = DB::table('konsumsi')
            ->select('tahun')
            ->groupBy('tahun')
            ->orderBy('konsumsi.tahun','DESC')
            ->get();
        return $query;
    }

    // detail
    public function detail($id_konsumsi)
    {
        $query = DB::table('konsumsi')
            ->select('konsumsi.*',
                    'jenis_produk.nama_jenis_produk',
                    'jenis_produk.slug_jenis_produk',
                    'kota.nama AS nama_kota',
                    'kota.ibukota',
                    'users.nama'
                    )
            ->join('jenis_produk','jenis_produk.id_jenis_produk','=','konsumsi.id_jenis_produk','LEFT')
            ->join('kota','kota.kode','=','konsumsi.kode','LEFT')
            ->join('users','users.id_user','=','konsumsi.id_user','LEFT')
            ->where('konsumsi.id_konsumsi',$id_konsumsi)
            ->orderBy('konsumsi.id_konsumsi','DESC')
            ->first();
        return $query;
    }
}
