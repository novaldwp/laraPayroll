<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Marital extends Model
{
    protected $table = 'marital';
    protected $fillable = [
        'name', 'status'
    ];
    public $incrementing = false;
}
