<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function respondWithSuccess($data, $message){
        return response([
            'status' => 'success',
            'data' => $data,
            'message' => $message
        ], 200);
    }

    public function respondWithError($data, $message){
        return response([
            'status' => 'error',
            'data' => $data,
            'message' => $message
        ], 200);
    }
}
