<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Services\Users\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{

    public function __construct(
        protected UserService $service,
    ) {
    }

    public function login(AuthRequest $request)
    {
        $token = $this->service->login($request);
        return response()->json([
            'token' => $token
        ], Response::HTTP_ACCEPTED);
    }
}
