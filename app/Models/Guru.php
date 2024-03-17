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
            'slug',
    ];
}
