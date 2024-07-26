<?php

namespace App\Models;
use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruBimbel extends Model
{
    use HasFactory,UsesUuid;

    protected $table = 'guru_bimbels';

    protected $fillable = [
        'bimbel_id',
        'guru_id',
        'jam_les',
        'jadwal_hari',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }

    public function bimbel()
    {
        return $this->belongsTo(Bimbel::class, 'bimbel_id', 'id');
    }
}
