<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['numeric', 'max:255'],
            'date_of_birth' => ['date'],
            'contact_number' => ['string', 'max:14', 'min:11'],
            'city_of_birth' => ['string', 'max:255'],
            'state_of_birth' => ['string', 'max:255'],
            'cpf' => ['string', 'max:11', 'min:11'],
            'rg' => ['string', 'max:7', 'min:7'],
            'street' => ['string', 'max:255'],
            'number' => ['string', 'max:255'],
            'neighborhood' => ['string', 'max:255'],
            'city' => ['string', 'max:255'],
            'state' => ['string', 'max:255'],
            'cep' => ['string', 'max:9', 'min:8'],
            'marital_status' => ['string', 'max:255'],
            'occupation' => ['string', 'max:255'],
            'gender' => ['string', 'max:4'],
            'level_of_education' => ['numeric'],
            'father_name' => ['string', 'max:255'],
            'mother_name' => ['string', 'max:255'],
            'date_of_baptism' => ['date'],
            'past_church' => ['string', 'max:255'],
            'past_ministry' => ['string', 'max:255'],
            'desire_ministry' => ['string', 'max:255'],
            'note' => ['string', 'max:255'],

        ];
    }
}
