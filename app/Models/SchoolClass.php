<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;
    // protected $table = 'School_classes';
    protected $fillable =[
        'name',
        'capacity',
       'is_fulled' ,
        'price',
        'time_from',
        'time_to'
    ];

   
  

     // public function getIsFulledAttribute($value)
    // {
    //     return $value ? 'Yes' : 'No';
    // }

    //او
    // public function getIsFulledTextAttribute()
    // {
    //     return $this->is_fulled ? 'Yes' : 'No';
    // } 
}








 

  
 

