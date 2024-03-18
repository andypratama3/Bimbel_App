<?php

namespace App\Models;

use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaketBimbel extends Model
{
    use HasFactory,UsesUuid,NameHasSlug;
    protected $table = 'paket_bimbels';

    protected $fillable = [
        'name',
        'foto',
        'slug',
    ];
}
