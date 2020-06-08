<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';
    protected $fillable = [
        'name', 'bank_code', 'status'
    ];
    public $incrementing = false;
}
