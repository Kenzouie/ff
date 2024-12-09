<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Wisdom Dental Care',
            'subtitle' => 'Online Reservation and Services'
        ];
        
        return view('dashboard', $data);
    }
}
