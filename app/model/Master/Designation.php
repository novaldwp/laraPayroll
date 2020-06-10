<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;
use App\Model\Master\Department;

class Designation extends Model
{
    protected $table = 'designation';
    protected $fillable = [
        'name', 'department_id', 'status'
    ];
    public $incrementing = false;

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
