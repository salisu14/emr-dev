<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\AppointmentStatus;

class StoreAppointmentRequest extends FormRequest
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
    //     dd(request('status'),implode(',', array_map(fn($status) => $status->label(), AppointmentStatus::cases()))
    // );
        return [
            'scheduled_at' => 'required|date',
            'reason' => 'required|string',
            'status' => 'required|in:' . implode(',', array_map(fn($status) => strtolower($status->label()), AppointmentStatus::cases())),
            'patient_id' => 'required|exists:patients,id',
            'physician_id' => 'required|exists:physicians,id',
        ];
    }
}
