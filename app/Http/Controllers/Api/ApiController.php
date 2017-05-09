<?php

namespace Boxes\Http\Controllers;

/**
 * Description of ApiController
 *
 * @author tmiller
 */
class ApiController extends Controller
{

    protected $statusCode = 200;

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respondNotFound($msg = 'Not Found') {
        return $this->setStatusCode(404)->respondWithError($msg);
    }
    
    public function respondInternalError($msg = 'Not Found') {
        return $this->setStatusCode(500)->respondWithError($msg);
    }

    public function respond($data, $headers = []) {
        return Reponse::json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithError($msg) {
        return $this->respond([
                    'error' => [
                        'message' => $msg,
                        'status_code' => $this->getStatusCode()
                    ]
        ]);
    }

}
