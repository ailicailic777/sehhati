<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    protected $fillable = [
        'patient_id', 'full_name', 'relationship', 'date_of_birth',
        'gender', 'blood_type', 'notes',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
