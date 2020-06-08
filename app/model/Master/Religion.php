<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $table = 'religion';
    protected $fillable = [
        'name', 'status'
    ];
    public $incrementing = false;
}
