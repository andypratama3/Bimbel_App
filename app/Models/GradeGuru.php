<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GradeGuru extends Model
{
    use HasFactory,UsesUuid;
    protected $table = 'grade_gurus';
    protected $fillable = [
        'bimbel_id',
        'guru_id',
    ];


}
