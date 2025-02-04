<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $record = new Comment();
        $record->fill($request->all());
        $record->save();
    }

    /*public function comment(int $id, string $text)
    {
        $user = Auth::user();
        return DB::table('comments')
            ->insert([
                'user' => $user->id,
                'performanceGoal' => $id,
                'text' => $text
            ]);
    }*/
}
