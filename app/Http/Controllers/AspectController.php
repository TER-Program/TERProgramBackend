<?php

namespace App\Http\Controllers;

use App\Models\Aspect;
use Illuminate\Http\Request;

class AspectController extends Controller
{
    public function index()
    {
        return Aspect::all();
    }

}
