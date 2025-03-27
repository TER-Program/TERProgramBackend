<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $record = new Comment();
        $record->fill($request->all());
        $record->save();
    }

    public function comment(int $id, string $text)
    {
        $user = Auth::user();
        return DB::table('comments')
            ->insert([
                'evaluator' => $user->id,
                'performanceGoal' => $id,
                'text' => $text,
                'created_at' => now()
            ]);
    }
    public function getCommentById(int $id){
        $sql = DB::table('comments as c')
        ->join('users as u', 'c.evaluator', '=', 'u.id')
        ->select(
            'evaluator',
            'u.name as name',
            'c.text as text',
            'c.created_at as date'
        )
        ->where('c.performanceGoal', $id)
        ->get();

        return response()->json($sql);
    }
}
