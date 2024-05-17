<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory, UsesUuid, NameHasSlug;

    protected $table = 'moduls';

    protected $fillable = [
        'name',
        'bimbel_id',
        'guru_id',
        'status',
        'slug',
    ];


    

}
