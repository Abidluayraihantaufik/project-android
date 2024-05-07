<?php

namespace App\Controllers;

use App\Models\RegistrationModel;

class RegistrationController extends RestfullController
{
    protected $registModel;

    public function __construct()
    {
        $this->registModel = new RegistrationModel();
    }

    public function regist()
    {
        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
        ];

        $this->registModel->addRegist($data);

        return $this->response(200, "success", "Registrasi Berhasil");
    }
}
