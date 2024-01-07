<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Medication extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // public function prescriptions(): BelongsToMany
    // {
    //     return $this->belongsToMany(Prescription::class, 'medication_prescription', 'medication_id', 'prescription_id')->withTimestamps();
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
