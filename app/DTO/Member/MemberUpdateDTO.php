<?php

namespace App\DTO\Member;

use App\Http\Requests\MemberRequest;

class MemberUpdateDTO
{
    public function __construct(
        public int $id,
        public int $user_id,
        public string $date_of_birth,
        public string $contact_number,
        public string $cpf,
        public string $rg,
        public string $street,
        public string $number,
        public string $neighborhood,
        public string $city,
        public string $state,
        public string $cep,
        public ?string $marital_status = null,
        public ?string $occupation = null,
        public ?string $gender = null,
        public ?int $level_of_education = null,
        public ?string $father_name = null,
        public ?string $mother_name = null,
        public ?string $date_of_baptism = null,
        public ?string $past_church = null,
        public ?string $past_ministry = null,
        public ?string $desire_ministry = null,
        public ?string $note = null
    ) {}

    static function makeFromRequest(MemberRequest $request): self{
        return new self(
            $request->id,
            $request->user_id,
            $request->date_of_birth,
            $request->contact_number,
            $request->cpf,
            $request->rg,
            $request->street,
            $request->number,
            $request->neighborhood,
            $request->city,
            $request->state,
            $request->cep,
            $request->marital_status,
            $request->occupation,
            $request->gender,
            $request->level_of_education,
            $request->father_name,
            $request->mother_name,
            $request->date_of_baptism,
            $request->past_church,
            $request->past_ministry,
            $request->desire_ministry,
            $request->note
        );
    }
}
