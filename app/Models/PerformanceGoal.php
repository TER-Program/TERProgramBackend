<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerformanceGoal extends Model
{
    protected $fillable = [
        'teacher',
        'evaluator',
        'aspect_item',
        'score',
        'scored'
    ];
}
