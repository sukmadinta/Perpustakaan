<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class DendaController extends Controller
{
    public function hitungDenda(Request $request)
    {
        $tanggalPinjam = new DateTime($request->tanggal_pinjam);
        $tanggalKembali = new DateTime($request->tanggal_kembali);
        $interval = $tanggalPinjam->diff($tanggalKembali);
        $days = $interval->days;
        
        $denda = 0;
        // Hanya kenakan denda jika lebih dari 14 hari
        if ($days > 14) {
            $dendaPerHari = 500; // Denda per hari setelah 14 hari
            $denda = ($days - 14) * $dendaPerHari;
        }
        
        return response()->json($denda);
    }
}
