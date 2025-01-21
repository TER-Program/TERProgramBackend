<?php

namespace App\Http\Controllers;

use App\Models\PerformanceGoal;
use Illuminate\Http\Request;

class PerformanceGoalController extends Controller
{
    public function index()
    {
        return PerformanceGoal::all();
    }
    public function store(Request $request)
    {
        $record = new PerformanceGoal();
        $record->fill($request->all());
        $record->save();
    }
}
