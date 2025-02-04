<?php

namespace App\Http\Controllers;

use App\Models\PerformanceGoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function getGoals(){
        $user = Auth::user();
        $userId = $user->id;
        $goals= DB::table('performance_goals as u')
        ->select('*')
        ->where('teacher', $userId)
        ->get();
        return response()->json($goals);
    }

    public function getGoalsById(string $id){
        $goals= DB::table('performance_goals as u')
        ->select('*')
        ->where('teacher', $id)
        ->get();
        return response()->json($goals);
    }

    public function score(string $id, int $score) {
        return DB::table('performance_goals')
            ->where('teacher', '=', $id)
            ->update(['score' => $score]);
    }
}
