<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Taxes extends Model
{
    protected $table = 'taxes';
    protected $fillable = [
        'name', 'value', 'marital_id', 'status'
    ];
    public $incrementing = false;
}
