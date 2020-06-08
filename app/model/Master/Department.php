<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    protected $fillable = [
        'name', 'code', 'status'
    ];
    public $incrementing = false;
}
