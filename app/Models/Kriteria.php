<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;

class Kriteria extends Model
{
    use HasFactory, NameHasSlug, UsesUuid;

    protected $table = 'kriterias';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'guru_kriteria');
    }
}
