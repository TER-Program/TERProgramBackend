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
    public function getPerfomanceGoals() {
        // Lekérdezés a három táblával
        $results = DB::table('performance_goals')
            ->join('aspect_items', 'performance_goals.aspect_item', '=', 'aspect_items.id') // INNER JOIN aspect_items
            ->join('users as teacher', 'performance_goals.teacher', '=', 'teacher.id') // INNER JOIN users for teacher
    
            ->select(
                'performance_goals.id',
                'performance_goals.score', // Pontszám
                'performance_goals.scored', // Értékelés dátuma
                'aspect_items.name as aspect_name', // Szempont neve
                'aspect_items.max_score', // Maximális pontszám
                'teacher.name as teacher_name', // Tanár neve
            )
            ->get();
    
        // Válasz visszaadása JSON formátumban
        return response()->json($results);
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

    public function score(string $id, int $score, int $evaluator) {
        return DB::table('performance_goals')
            ->where('id', '=', $id)
            ->update([
                'score' => $score,  
                'evaluator' => $evaluator,
                'scored' => now()
        ]);
    }

    public function scoreByTeacher() {
        $result = DB::table('users')
            ->leftJoin('performance_goals', 'performance_goals.teacher', '=', 'users.id')
            ->where('users.role', 2)
            ->select('users.id', 'users.name', DB::raw('SUM(performance_goals.score) as total_score'))
            ->groupBy('users.id', 'users.name')
            ->get();

        return response()->json($result);
    }
    public function performanceGoalFill(int $teacherId ) {
        $aspectItems = DB::table('aspect_items')->pluck('id');
        $insertData = $aspectItems->map(function ($aspectItemId) use ($teacherId) {
            return [
                'teacher' => $teacherId,
                'aspect_item' => $aspectItemId,
                'created_at' => now()
            ];
        })->toArray();

        DB::table('performance_goals')->insert($insertData);
    }

}
