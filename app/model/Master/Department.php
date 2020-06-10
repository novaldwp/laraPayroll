<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;
use App\Model\Master\Designation;

class Department extends Model
{
    protected $table = 'department';
    protected $fillable = [
        'name', 'code', 'status'
    ];
    public $incrementing = false;

    public function designation() {
        return $this->hasMany(Designation::class);
    }
}
