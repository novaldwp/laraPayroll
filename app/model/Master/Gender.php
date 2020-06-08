<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'gender';
    protected $fillable = [
        'name', 'status'
    ];
    public $incrementing = false;
}
