<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVisitRequest extends FormRequest
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
            'date' => 'required|date|max:50',
            'complaint'  => 'required|string|max:100',
            'diagnosis'  => 'required|string|max:100',
            'treatment'  => 'required|string|max:200',
            'prescription'  => 'required|string|max:200',
            'patient_id' => 'required',
            'physician_id' => 'required',
        ];
    }
}
