<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'show'];

    public function availableNumbers()
    {
        return $this->hasMany(AvailableNumber::class);
    }

    public function firstPreference()
    {
        return $this->hasMany(Applicant::class, 'first_preference_id');
    }

    public function secondPreference()
    {
        return $this->hasMany(Applicant::class, 'second_preference_id');
    }
}
