<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    protected $table = 'blood_type';
    protected $fillable = [
        'name', 'status'
    ];
    public $incrementing = false;
}
