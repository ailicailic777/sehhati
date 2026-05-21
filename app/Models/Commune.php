<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = ['wilaya_id', 'code', 'name_ar', 'name_en', 'name_fr'];

    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }
}
