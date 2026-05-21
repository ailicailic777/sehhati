<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'name_fr', 'description', 'icon'];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
