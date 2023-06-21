<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStudentRequest extends FormRequest
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
            'nameAr' => 'required|string',
            'nameEn' => 'required|string',
            'phone' => 'required|numeric',
            'ssn' => 'required|numeric|unique:students,ssn',
            'seatNo' => 'required|numeric',
            'group_id' => 'required|exists:groups,id',
        ];
    }
}
