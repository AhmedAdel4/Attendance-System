<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEn'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
