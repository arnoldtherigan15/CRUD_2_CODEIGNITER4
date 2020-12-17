<?php

namespace App\Models;

use CodeIgniter\Model;

class PetModel extends Model
{
    protected $table = "pets";
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'species', 'birth_year', 'photo'];

    public function getPets()
    {
        return $this->findAll();
    }

    public function getDetail($id)
    {
        return $this->where('id', $id)->first();
    }
}
