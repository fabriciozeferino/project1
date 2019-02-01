<?php

namespace Modules\Project\Http\Services;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;

abstract class AbstractService
{
    public function respondWithJson($data, $status)
    {
        return response()->json($data, $status, [], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
}
