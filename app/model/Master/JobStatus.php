<?php

namespace App\MOdel\Master;

use Illuminate\Database\Eloquent\Model;

class JobStatus extends Model
{
    protected $table = 'jobstatus';
    protected $fillable = [
        'name', 'status'
    ];
    public $incrementing = false;
}
