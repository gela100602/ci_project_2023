<?php

namespace App\Models;
use CodeIgniter\Model;

class EmployeeModel extends Model {
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'full_name',
        'gender',
        'birth_date',
        'age',
        'contact_number',
        'email',
        'shift_id',
        'hire_date',
        'password'
    ];

    protected $returnType = 'object';
}

