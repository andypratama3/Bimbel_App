<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeskripsiAnak extends Model
{
    use HasFactory, UsesUuid, NameHasSlug;

    protected $table = 'deskripsi_anaks';

    protected $fillable = [
        'name',
        'bimbel_id',
        'guru_id',
        'description',
        'sesi',
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
