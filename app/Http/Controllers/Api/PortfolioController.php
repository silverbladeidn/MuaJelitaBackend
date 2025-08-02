<?php
// File: app/Http/Controllers/Api/PortfolioController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the portfolio.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // Ambil semua data portfolio dari database
            $portfolios = DB::table('portofolio')
                ->select('id', 'nama_portofolio', 'gambar_porto', 'deskripsi')
                ->orderBy('id', 'asc')
                ->get();

            // Return response success
            return response()->json([
                'success' => true,
                'message' => 'Data portfolio berhasil diambil',
                'data' => $portfolios,
                'count' => $portfolios->count()
            ], 200);
        } catch (Exception $e) {
            // Return response error
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data portfolio',
                'error' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    /**
     * Display the specified portfolio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            // Ambil data portfolio berdasarkan ID
            $portfolio = DB::table('portofolio')
                ->select('id', 'nama_portofolio', 'gambar_porto', 'deskripsi')
                ->where('id', $id)
                ->first();

            // Cek apakah portfolio ditemukan
            if (!$portfolio) {
                return response()->json([
                    'success' => false,
                    'message' => 'Portfolio tidak ditemukan',
                    'data' => null
                ], 404);
            }

            // Return response success
            return response()->json([
                'success' => true,
                'message' => 'Data portfolio berhasil diambil',
                'data' => $portfolio
            ], 200);
        } catch (Exception $e) {
            // Return response error
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data portfolio',
                'error' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }
}
