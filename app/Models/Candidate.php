<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'image',
        'year',
        'election_id'
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function election()
    {
        return $this->belongsTo(Election::class);
    }
}
