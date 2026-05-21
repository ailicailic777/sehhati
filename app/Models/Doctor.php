<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'user_id', 'specialty_id', 'license_number', 'wilaya', 'commune',
        'address', 'consultation_fee', 'rating', 'is_verified',
        'bio', 'education', 'experience_years',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'rating' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(Patient::class, 'favorites');
    }

    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    public function scopeBySpecialty($query, $specialtyId)
    {
        return $query->where('specialty_id', $specialtyId);
    }

    public function scopeByWilaya($query, $wilaya)
    {
        return $query->where('wilaya', $wilaya);
    }
}
