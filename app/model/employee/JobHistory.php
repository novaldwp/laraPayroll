<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    protected $table = 'job_history';
    protected $fillable = [
        'start', 'end', 'company_name', 'address', 'reason',
        'jobstatus_id', 'employee_id', 'department_id', 'designation_id'
    ];
    public $incrementing = false;
}
