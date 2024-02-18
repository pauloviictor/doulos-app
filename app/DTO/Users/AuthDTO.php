<?php

namespace App\DTO\Users;

use App\Http\Requests\AuthRequest;

class AuthDTO
{
    public function __construct(
        public string $email,
        public string $password,
        public string $device_name,
    )
    {}

    static function makeFromRequest(AuthRequest $request): self{
        return new self(
            $request->email,
            $request->password,
            $request->device_name,
        );
    }
}
