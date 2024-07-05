<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamModel;
use App\Models\PetugasModel;
use App\Models\AnggotaModel;
use App\Models\BukuModel;
use App\Models\ReturnModel;

class PinjamController extends Controller
{
    // Metode untuk menampilkan semua data peminjaman
    public function pinjamtampil()
    {
        $datapeminjaman = PinjamModel::orderBy('id_pinjam', 'ASC')->paginate(5);
        $petugas = PetugasModel::all(); // Mengambil data petugas dari database
        $anggota = AnggotaModel::all(); // Mengambil data anggota dari database
        $buku = BukuModel::all(); // Mengambil data buku dari database
        
        return view('halaman/view_pinjam', [
            'pinjam' => $datapeminjaman,
            'petugas' => $petugas,
            'anggota' => $anggota,
            'buku' => $buku
        ]);
    }

    // Metode untuk menambahkan data peminjaman
    public function pinjamtambah(Request $request)
    {
        $this->validate($request, [
            'id_petugas' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'tanggal_pinjam' => 'required|date'
        ]);

        // Simpan data peminjaman baru ke dalam database
        PinjamModel::create([
            'id_petugas' => $request->id_petugas,
            'id_anggota' => $request->id_anggota,
            'id_buku' => $request->id_buku,
            'tanggal_pinjam' => $request->tanggal_pinjam
        ]);

        return redirect()->back()->with('success', 'Data peminjaman berhasil ditambahkan');
    }

    // Metode untuk mengedit data peminjaman
    public function pinjamedit($id_pinjam, Request $request)
    {
        $this->validate($request, [
            'id_petugas' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'tanggal_pinjam' => 'required|date'
        ]);

        $dataPinjam = PinjamModel::find($id_pinjam);
        $dataPinjam->id_petugas = $request->id_petugas;
        $dataPinjam->id_anggota = $request->id_anggota;
        $dataPinjam->id_buku = $request->id_buku;
        $dataPinjam->tanggal_pinjam = $request->tanggal_pinjam;
        $dataPinjam->save();

        return redirect()->back()->with('success', 'Data peminjaman berhasil diedit');
    }

    // Metode untuk menghapus data peminjaman
    public function pinjamhapus($id_pinjam)
    {
        $dataPinjam = PinjamModel::find($id_pinjam);
        $dataPinjam->delete();

        return redirect()->back()->with('success', 'Data peminjaman berhasil dihapus');
    }
}