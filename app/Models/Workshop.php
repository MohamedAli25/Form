<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'show'];

    public function applicants()
    {
        return $this->belongsToMany(Applicant::class);
    }
}
