<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerformanceGoal extends Model
{
    protected $fillable = [
        'teacher',
        'aspect_item',
        'document',
        'name',
        'status',
        'score',
        'completed'
    ];
}
