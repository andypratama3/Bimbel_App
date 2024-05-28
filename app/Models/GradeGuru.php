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
        'kriteria_id',
        'jenjang'
    ];

    public function bimbel()
    {
        return $this->belongsTo(Bimbel::class, 'bimbel_id', 'id');
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id', 'id');
    }

}
