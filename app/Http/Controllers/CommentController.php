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
    public function getComments()
    {
        $sql = DB::table('comments as c')
            ->join('users as u', 'c.evaluator', '=', 'u.id')
            ->select(
                'c.id',
                'performanceGoal',
                'evaluator',
                'u.name as name',
                'c.text as text',
                'c.created_at as date'
            )
            ->get();
        return response()->json($sql);
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return response()->json(['message' => 'Komment sikeresen törölve!']);
    }

    public function getCommentsById($id)
    {
        $comments = DB::table('comments as c')
            ->join('users as u', 'c.evaluator', '=', 'u.id')
            ->join('performance_goals as p', 'c.performanceGoal', '=', 'p.id')
            ->join('aspect_items as a', 'p.aspect_item', 'a.id')
            ->where('p.teacher', $id)
            ->select(
                'a.name',
                'c.id as comment_id',
                'c.performanceGoal',
                'c.evaluator',
                'u.name as evaluator_name',
                'c.text as comment_text',
                'c.created_at as comment_date'
            )
            ->get();

        return response()->json($comments);
    }
}
