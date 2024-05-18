<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory, UsesUuid;

    protected $table = 'absensis';

    protected $fillable = [
        'tanggal_mulai',
        'tanggal_selesai',
        'bimbel_id',
        'guru_id',
        'sesi',
        'foto_absen',
    ];


    public function bimbel()
    {
        return $this->BelongsTo(Bimbel::class,);
    }

    public function guru()
    {
        return $this->BelongsTo(Guru::class,);
    }
}
