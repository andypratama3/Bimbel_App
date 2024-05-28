<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory,UsesUuid,NameHasSlug;
    protected $table = 'gurus';

    protected $fillable = [
            'name',
            'cv',
            'whatsapp',
            'mata_pelajaran',
            'paket',
            'status',
            'foto',
            'jenjang',
            'slug',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function grade()
    {
        return $this->hasMany(GradeGuru::class, 'guru_id');
    }

    /**
     * The kriteria that belong to the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function kriteria()
    {
        return $this->belongsToMany(Kriteria::class, 'guru_kriteria');
    }
}
