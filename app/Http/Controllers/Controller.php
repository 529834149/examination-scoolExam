<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function returnCode($code,$message='',$data='')
    {
        switch ($code) {
            case 200:
                $msg = 'OK';
                break;
            case 400:
                $msg = 'Bad Request';
                break;
            case 401:
                $msg = 'Unauthorized';
                break;
            case 404:
                $msg = 'Not Found';
                break;
            case 408:
                $msg = 'Request Time-out';
                break;
            case 409:
                $msg = 'Conflict';
                break;
            case 500:
                $msg = 'Internal Server Error';
                break;
            case 503:
                $msg = 'Service Unavailable';
                break;
            default:
                break;
        }
        if($message != '') {
            $message = $msg.':'.$message;
        } else {
            $message = $msg;
        }

        $result = [
            'meta'=>[
                'code'=>$code,
                'message'=>$message,
            ],
            
        ];
        if($data !='') {
            $result = array_add($result,'data',$data);
        }
        return $result;     

    }
}
