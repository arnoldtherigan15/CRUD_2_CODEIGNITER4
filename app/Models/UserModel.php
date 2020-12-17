<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "users";
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'address'];

    public function search($keywoard)
    {
        return $this->table('users')->like('name', $keywoard)->orLike('address', $keywoard);
    }
}
