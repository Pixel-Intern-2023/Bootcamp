<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'name',
        'profile',
        'expertise',
        'biography',
    ];
}