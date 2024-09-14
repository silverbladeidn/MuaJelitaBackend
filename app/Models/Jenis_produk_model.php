<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jenis_produk_model extends Model
{
    use HasFactory;

    // listing
    public function listing()
    {
        $query = DB::table('jenis_produk')
            ->select('*')
            ->orderBy('jenis_produk.id_jenis_produk','DESC')
            ->get();
        return $query;
    }

    // detail
    public function detail($id_jenis_produk)
    {
        $query = DB::table('jenis_produk')
            ->select('*')
            ->where('jenis_produk.id_jenis_produk',$id_jenis_produk)
            ->orderBy('jenis_produk.id_jenis_produk','DESC')
            ->first();
        return $query;
    }
}
