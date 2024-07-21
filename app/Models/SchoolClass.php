<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoolClass extends Model
{
    use HasFactory;
    // protected $table = 'School_classes';
    protected $fillable =[
        'name',
        'capacity',
       'is_fulled' ,
        'price',
        'time_from',
        'time_to',
    ];
}
