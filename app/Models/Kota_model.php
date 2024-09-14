<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kota_model extends Model
{
    use HasFactory;

    // listing
    public function listing()
    {
        $query = DB::table('kota')
            ->select('*')
            ->orderBy('kota.kode','ASC')
            ->get();
        return $query;
    }

    // list_provinsi
    public function list_provinsi()
    {
        $query = DB::table('kota')
            ->select('kode',
                    DB::raw('MAX(nama) AS nama'),
                    DB::raw('MAX(ibukota) AS ibukota'))
            ->where(DB::raw('LENGTH(kode)'),2)
            ->groupBy('kode')
            ->orderBy('kode', 'ASC')
            ->get();
        return $query;
    }

    // list_kabupaten
    public function list_kabupaten($kode)
    {
        $query = DB::table('kota')
            ->select('*')
            ->where(DB::raw('SUBSTR(kode,1,2)'),$kode)
            ->where(DB::raw('LENGTH(kode)'), '>', 2)
            ->orderBy('kode', 'ASC')
            ->get();
        return $query;
    }

    // detail
    public function detail($kode)
    {
        $query = DB::table('kota')
            ->select('*')
            ->where('kota.kode',$kode)
            ->orderBy('kota.kode','ASC')
            ->first();
        return $query;
    }
}
