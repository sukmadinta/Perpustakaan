<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamModel;
use App\Models\PengembalianModel;
use DateTime;

class PengembalianController extends Controller
{
    // Metode untuk menampilkan semua data pengembalian
    public function pengembaliantampil()
    {
        $datapengembalian = PengembalianModel::orderby('id_pengembalian', 'ASC')->paginate(5);
        return view('halaman/view_pengembalian', ['pengembalians' => $datapengembalian]);
    }

    // Metode untuk menambahkan data pengembalian
    public function pengembaliantambah(Request $request)
    {
        $this->validate($request, [
            'id_pinjam' => 'required',
            'tanggal_pengembalian' => 'required|date'
        ]);

        // Menghitung denda
        $pinjam = PinjamModel::find($request->id_pinjam);
        $tanggalPinjam = new DateTime($pinjam->tanggal_pinjam);
        $tanggalPengembalian = new DateTime($request->tanggal_pengembalian);
        $interval = $tanggalPinjam->diff($tanggalPengembalian);
        $days = $interval->days;
        $denda = 0;
        
        // Hanya kenakan denda jika lebih dari 14 hari
        if ($days > 14) {
            $dendaPerHari = 500; // Denda per hari setelah 14 hari
            $denda = ($days - 14) * $dendaPerHari;
        }

        $pengembalian = new PengembalianModel();
        $pengembalian->id_pinjam = $request->id_pinjam;
        $pengembalian->tanggal_pengembalian = $request->tanggal_pengembalian;
        $pengembalian->denda = $denda;
        $pengembalian->save();

        return redirect('/pengembalian')->with('success', 'Data pengembalian berhasil ditambahkan.');
    }

    // Metode untuk menghapus data pengembalian
    public function pengembalianhapus($id_pengembalian)
    {
        $datapengembalian = PengembalianModel::find($id_pengembalian);
        if ($datapengembalian) {
            $datapengembalian->delete();
        }

        return redirect()->back();
    }

    // Metode untuk mengedit data pengembalian
    public function pengembalianedit($id_pengembalian, Request $request)
    {
        $this->validate($request, [
            'id_pinjam' => 'required',
            'tanggal_pengembalian' => 'required|date'
        ]);

        $datapengembalian = PengembalianModel::find($id_pengembalian);
        if ($datapengembalian) {
            // Menghitung denda
            $pinjam = PinjamModel::find($request->id_pinjam);
            $tanggalPinjam = new DateTime($pinjam->tanggal_pinjam);
            $tanggalPengembalian = new DateTime($request->tanggal_pengembalian);
            $interval = $tanggalPinjam->diff($tanggalPengembalian);
            $days = $interval->days;
            $denda = 0;
            
            // Hanya kenakan denda jika lebih dari 14 hari
            if ($days > 14) {
                $dendaPerHari = 500; // Denda per hari setelah 14 hari
                $denda = ($days - 14) * $dendaPerHari;
            }

            $datapengembalian->id_pinjam = $request->id_pinjam;
            $datapengembalian->tanggal_pengembalian = $request->tanggal_pengembalian;
            $datapengembalian->denda = $denda;
            $datapengembalian->save();
        }

        return redirect()->back();
    }
}
