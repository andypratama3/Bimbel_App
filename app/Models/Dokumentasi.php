<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory, UsesUuid, NameHasSlug;

    protected $table = 'dokumentasis';

    protected $fillable = [
        'name',
        'bimbel_id',
        'guru_id',
        'foto',
        'tanggal',
        'slug',
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
