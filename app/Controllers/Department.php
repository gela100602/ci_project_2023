<?php
namespace App\Controllers;

class Department extends BaseController
{
    public function index(): string
    {
        $departmentModel = new \App\Models\DepartmentModel();
        $data['department'] = $departmentModel->findAll();
        
        return view('department/index', $data);
    }   
}
