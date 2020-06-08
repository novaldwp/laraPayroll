<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table = 'designation';
    protected $fillable = [
        'name', 'department_id', 'status'
    ];
    public $incrementing = false;
}
