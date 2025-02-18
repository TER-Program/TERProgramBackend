<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerformanceGoal extends Model
{
    protected $fillable = [
        'teacher',
        'evaulator',
        'aspect_item',
        'score',
        'scored'
    ];
}
