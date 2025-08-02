<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Porto_model extends Model
{
    use HasFactory;

    // listing
    public function listing()
    {
        $query = DB::table('portofolio')
            ->select('*')
            ->orderBy('portofolio.id', 'DESC')
            ->get();
        return $query;
    }

    // detail
    public function detail($id_porto)
    {
        $query = DB::table('portofolio')
            ->select('*')
            ->where('portofolio.id', $id_porto)
            ->orderBy('portofolio.id', 'DESC')
            ->first();
        return $query;
    }
}
