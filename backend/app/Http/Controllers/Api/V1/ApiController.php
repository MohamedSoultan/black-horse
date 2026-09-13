<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Routing\Controller;

abstract class ApiController extends Controller
{
    protected function success(mixed $data, array $meta = [])
    {
        return response()->json(['data' => $data, 'meta' => $meta]);
    }
}
