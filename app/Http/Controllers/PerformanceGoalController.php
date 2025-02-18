<?php

namespace App\Http\Controllers;

use App\Models\PerformanceGoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

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

    public function getGoalsById(string $id) {
        $goals = DB::table('performance_goals as pg')
            ->join('users as u', 'pg.teacher', '=', 'u.id')
            ->join('aspect_items as ai', 'pg.aspect_item', '=', 'ai.id')
            ->select(
                'pg.*',
                'u.name as teacher_name',
                'u.email as teacher_email',
                'u.role as teacher_role',
                'ai.name as aspect_name',
                'ai.description as aspect_description',
                'ai.max_score',
                'ai.doc_required'
            )
            ->where('pg.teacher', $id)
            ->get();

        return response()->json($goals);
    }

    public function score(string $id, int $score) {
        return DB::table('performance_goals')
            ->where('teacher', '=', $id)
            ->update(['score' => $score]);
    }

    public function scoreByTeacher() {
        $result = DB::table('performance_goals')
            ->join('users', 'users.id', '=', 'performance_goals.teacher')
            ->select('users.name', DB::raw('SUM(performance_goals.score) as total_score'))
            ->groupBy('users.name')
            ->first();

        return response()->json($result);
    }
}
