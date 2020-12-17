<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $keywoard = $this->request->getVar('keywoard');
        if ($keywoard) {
            $user = $this->userModel->search($keywoard);
        } else {
            $user = $this->userModel;
        }
        // echo 'masuk';
        $data = [
            "title" => "User Lists",
            "users" => $user->paginate(10, 'users'),
            "pager" => $this->userModel->pager
        ];
        return view('users/index', $data);
    }
}
