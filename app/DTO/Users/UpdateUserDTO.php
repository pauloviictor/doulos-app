<?php

namespace App\DTO\Users;

use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class UpdateUserDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public string $password,
    ) {
    }

    static function makeFromRequest(RegisterRequest $request, string $id): self
    {
        return new self(
            $id,
            $request->name,
            $request->email,
            $request->password,
        );
    }
}
