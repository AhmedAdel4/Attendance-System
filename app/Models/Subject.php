<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nameAr',
        'nameEn'
    ];

    public function instructors()
    {
        return $this->belongsToMany(User::class);
    }

    public function weeks()
    {
        return $this->belongsToMany(Week::class);
    }
}
