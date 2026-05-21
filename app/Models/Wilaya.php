<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    protected $fillable = ['code', 'name_ar', 'name_en', 'name_fr'];

    public function communes()
    {
        return $this->hasMany(Commune::class);
    }
}
