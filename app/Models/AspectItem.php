<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AspectItem extends Model
{
    protected $fillable = [
        'aspect',
        'max_score',
        'name',
        'description'

    ];
}
