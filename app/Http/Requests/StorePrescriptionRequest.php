<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrescriptionRequest extends FormRequest
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
        // dd(request());
        return [
            'patient_id' => 'required',
            'medication_id' => 'required',
            'physician_id' => 'required',
            'date_prescribed' => 'required|date',
            'quantity' => 'required|integer',
            'refills' => 'required|integer',
        ];
    }
}
