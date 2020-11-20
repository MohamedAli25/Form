<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableNumber extends Model
{
    use HasFactory;

    protected $fillable = ['committee_id', 'time_slot_id', 'available_number'];

    public function committee()
    {
        return $this->belongsTo(Committee::class);
    }

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
