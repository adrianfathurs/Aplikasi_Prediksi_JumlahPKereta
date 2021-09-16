<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenumpangKeretaModel extends Model
{
    use HasFactory;
    protected $table = 'penumpang_kereta';
    protected $fillable = [
        'id',
        'Bulan',
        'Index_Bulan',
        'Tahun',
        'Jumlah_Penumpang',
        'user_id',
    ];
    public function tampilData()
    {
    }
}
