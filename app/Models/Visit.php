<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = ['date',  'patient_id', 'physician_id','complaint', 'diagnosis', 'treatment', 'prescription'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
