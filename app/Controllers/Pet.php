<?php

namespace App\Controllers;

class Pet extends BaseController
{

    public function index()
    {

        $pets = $this->petModel->getPets();
        $data = [
            'title' => 'Pet List',
            'pets' => $pets
        ];
        return view('pets/index', $data);
    }
}
