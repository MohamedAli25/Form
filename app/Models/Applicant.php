<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'university', 'faculty', 'department', 'academic_year', 'first_preference_id', 'second_preference_id', 'available_number_id'];

    public function firstPreference()
    {
        return $this->belongsTo(Committee::class, 'first_preference_id');
    }

    public function secondPreference()
    {
        return $this->belongsTo(Committee::class, 'second_preference_id');
    }

    public function availableNumber()
    {
        return $this->belongsTo(AvailableNumber::class);
    }

    public function workshops()
    {
        return $this->belongsToMany(Workshop::class);
    }
}
