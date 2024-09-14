<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dasbor extends Controller
{

    // index
    public function index()
    {
        $data = [   'title'     => 'Halaman Dashboard',
                    'content'   => 'admin/dasbor/index'
                ];
        return view('admin/layout/wrapper',$data);
    }
}
