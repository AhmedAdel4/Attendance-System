<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


    protected $fillable = [
        'nameAr',
        'nameEn',
        'seatNo',
        'ssn',
        'phone',
        'barcode',
        'group_id',
    ];


    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
