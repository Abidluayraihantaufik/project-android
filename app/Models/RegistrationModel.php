<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrationModel extends Model
{
    protected $table            = 'member';
    protected $allowedFields    = ['nama', 'email', 'password'];

    function addRegist($data)
    {
        $this->insert($data);
    }
}
