<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $record = new Comment();
        $record->fill($request->all());
        $record->save();
    }
}
