<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'calories_required_before_workout',
        'calories_required_after_workout',
        'exercise_start_time',
        'exercise_end_time',
        'hours',
        'date',
        'period',
        'type',
        'length'
    ];
}
