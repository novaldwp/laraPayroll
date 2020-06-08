<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = "account";
    protected $fillable = [
        'name', 'account_number', 'branch', 'status', 'bank_id'
    ];
    public $incrementing = false;
}
