<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class RestfullController extends ResourceController
{
    protected $format = 'json';

    public function response($code, $status, $data)
    {
        return $this->respond([
            'code'      => $code,
            'status'    => $status,
            'data'      => $data
        ]);
    }
}
