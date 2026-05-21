<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id', 'date_of_birth', 'gender', 'wilaya', 'commune',
        'address', 'blood_type', 'weight', 'height',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Doctor::class, 'favorites');
    }
}
