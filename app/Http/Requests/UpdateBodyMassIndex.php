<?php

namespace App\Http\Requests;

use App\Enums\SexEnum;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBodyMassIndex extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'sex' => [new Enum(SexEnum::class)],
            'age' => 'required|integer',
            'height' => 'required|decimal:0,2',
            'weight' => 'required|decimal:0,2',
            'note' => 'max:65553',
        ];
    }
}
