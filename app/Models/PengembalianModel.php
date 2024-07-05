<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembalianModel extends Model
{
    use HasFactory;
    protected $table = 'pengembalians';
    protected $primaryKey = 'id_pengembalian';
    protected $fillable = ['id_pinjam', 'tanggal_pengembalian', 'denda'];

    public function pinjam()
    {
        return $this->belongsTo('App\Models\PinjamModel', 'id_pinjam');
    }
}