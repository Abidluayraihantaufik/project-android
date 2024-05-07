<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\MemberModel;

class LoginController extends RestfullController
{
    protected $memberModel, $loginModel;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
        $this->loginModel = new LoginModel();
    }

    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $validUser = $this->isUserExist($email);

        $this->passwordVerify($validUser, $password);

        $authKey = uniqid('auth-', true);

        $data = [
            'member_id' => $validUser['id'],
            'auth_key' => $authKey
        ];

        $this->loginModel->isLogin($data);

        return $this->response(200, "success", [
            'auth_token' => $authKey,
            'user' => [
                'id' => $validUser['id'],
                'email' => $validUser['email']
            ]
        ]);
    }

    function isUserExist($email)
    {
        $user = $this->memberModel->getUsers($email);

        if (!$user) {
            return $this->response(400, "fail", 'Email tidak ditemukan.');
        }

        return $user;
    }

    function passwordVerify($user, $password)
    {
        $passwordValid = password_verify($password, $user['password']);

        if (!$passwordValid) {
            return $this->response(400, "fail", 'Password salah.');
        }
    }
}
