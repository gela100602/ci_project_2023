<?php
namespace App\Controllers;

class Location extends BaseController
{
    public function index(): string
    {
        $locationModel = new \App\Models\LocationModel();
        $data['location'] = $locationModel->findAll();
        
        return view('location/index', $data);
    }   
}
