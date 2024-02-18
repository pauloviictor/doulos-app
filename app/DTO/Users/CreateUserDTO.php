<?php

namespace App\DTO\Users;

use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class CreateUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    )
    {}

    static function makeFromRequest(RegisterRequest $request): self{
        return new self(
            $request->name,
            $request->email,
            $request->password,
        );
    }
}
