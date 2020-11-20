<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = ['date'];

    public function availableNumbers()
    {
        return $this->hasMany(AvailableNumber::class);
    }

    public function applicants()
    {
        return $this->hasManyThrough(Applicant::class, AvailableNumber::class);
    }
}
