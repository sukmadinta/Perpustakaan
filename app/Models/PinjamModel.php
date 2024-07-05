<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamModel extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $primaryKey = 'id_pinjam';

    protected $fillable = [
        'id_petugas',
        'id_anggota',
        'id_buku',
        'tanggal_pinjam'
    ];

    public function petugas()
    {
        return $this->belongsTo(PetugasModel::class, 'id_petugas');
    }

    public function anggota()
    {
        return $this->belongsTo(AnggotaModel::class, 'id_anggota');
    }

    public function buku()
    {
        return $this->belongsTo(BukuModel::class, 'id_buku');
    }
}
