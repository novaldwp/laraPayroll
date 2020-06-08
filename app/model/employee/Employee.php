<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $fillable = [
        //personal detail
        'nik', 'first_name', 'last_name', 'bop', 'bod', 'gender_id', 'bloodtype_id', 'religion_id',
        'marital_id', 'tax_id', 'nationality',

        //contact information
        'phone', 'email', 'address',

        //account information -> skip

        //employee affair
        'department_id', 'designation_id', 'jobstatus_id', 'salary', 'join_date', 'leave_date',

        //job history -> skip

        //document information -> skip'
    ];
}
