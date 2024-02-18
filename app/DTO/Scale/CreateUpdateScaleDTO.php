<?php

namespace App\DTO\Scale;

use Illuminate\Http\Request;

class CreateUpdateScaleDTO
{
    public function __construct(
        public string $date,
        public string $ministry_id,
        public string $user_id,
    )
    {}

    static function makeFromRequest(Request $request): self{
        return new self(
            $request->date,
            $request->ministryId,
            $request->userId,
        );
    }
}
