<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'scheduled_at',
        'reason',
        'status',
        'patient_id',
        'physician_id',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function physician()
    {
        return $this->belongsTo(Physician::class, 'physician_id');
    }
}
