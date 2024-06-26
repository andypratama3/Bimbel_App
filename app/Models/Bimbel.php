<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bimbel extends Model
{
    use HasFactory,UsesUuid,NameHasSlug;
    protected $table = 'bimbels';

    protected $fillable = [
            'nama_anak',
            'jk',
            'usia',
            'kelas_berjalan',
            'jenjang_sekolah',
            'bimbingan_konsultasi',
            'program_les',
            'jumlah_pertemuan',
            'tanggal_mulai',
            'pelajaran_tertentu',
            'mengaji',
            'alamat',
            'asal_sekolah',
            'agama',
            'orang_tua',
            'no_telp',
            'catatan_anak_didik',
            'catatan_guru_les',
            'informasi_bimbel',
            'foto_pembayaran',
            'nama_pembayar',
            'status',
            'image_pembayaran',
            'alasan',
            'slug',
            'user_id',
    ];
    // public function setNama_AnakAttribute($value)
    // {
    //     $this->attributes['nama_anak'] = $value;
    //     $this->attributes['slug'] = Str::slug($value).'-'.Str::random(4);
    // }
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
