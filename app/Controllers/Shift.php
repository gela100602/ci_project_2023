<?php
namespace App\Controllers;

class Shift extends BaseController
{
    public function index(): string
    {
        $shiftModel = new \App\Models\ShiftModel();
        $data['shift'] = $shiftModel->findAll();
        
        return view('shift/index', $data);
    }   
}
