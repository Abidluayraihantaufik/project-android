<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table            = 'member';

    public function getUsers($email = null)
    {
        if ($email == null) {
            return $this->findAll();
        }

        $user = $this->where('email', $email)->first();

        return $user;
    }
}
