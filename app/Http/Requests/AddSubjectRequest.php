<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSubjectRequest extends FormRequest
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
            'nameAr' => 'required|string|regex:/^[\x{0621}-\x{064A0}-9 ]+$/u|unique:subjects,nameAr',
            'nameEn' => 'required|string|unique:subjects,nameEn'
        ];
    }
}
