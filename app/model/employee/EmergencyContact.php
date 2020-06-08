<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    protected $table = 'emergency_contact';
    protected $fillable = [
        'name', 'relation', 'phone', 'address', 'employee_id', 'status'
    ];
    public $incrementing = false;

}
