<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests {
        authorize as protected baseAuthorize;
    }

    public function authorize($ability, $arguments = [])
    {
        if (Auth::guard('api')->check()) {
            Auth::shouldUse('api');
        }

        $this->baseAuthorize($ability, $arguments);
    }
}
