<?php

namespace App\DTO\Ministry;

use Illuminate\Http\Request;

class CreateUpdateMinistryDTO
{
    public function __construct(
        public string $name,
        public string $leader_id,
    )
    {}

    static function makeFromRequest(Request $request): self{
        return new self(
            $request->name,
            $request->leaderId,
        );
    }
}
