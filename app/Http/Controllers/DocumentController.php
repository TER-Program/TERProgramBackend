<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use League\CommonMark\Node\Block\Document;

class DocumentController extends Controller
{
    public function index()
    {
        return Documents::all();
    }

    public function store(Request $request)
    {
        $record = new Documents();
        $record->fill($request->all());
        $record->save();
    }
}
