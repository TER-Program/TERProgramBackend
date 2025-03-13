<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Node\Block\Document;

class DocumentController extends Controller
{
    public function index()
    {
        return Documents::all();
    }


    public function store(Request $request)
    {
        \Log::info('Request data:', $request->all());
        $request->validate([
            'pdf' => 'required|file|mimes:pdf|max:10240', // A fájl max 10MB
            'performanceGoal' => 'required|exists:performance_goals,id', // A performanceGoal ID validálása
        ]);
        if ($request->hasFile('pdf') && $request->file('pdf')->isValid()) {
            $file = $request->file('pdf');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('documents', $fileName, 'public');
            $document = new Documents();
            $document->document_name = $file->getClientOriginalName();
            $document->document_path = $filePath;
            $document->performanceGoal = $request->performanceGoal;
            $document->save();
            return response()->json([
                'message' => 'Fájl sikeresen feltöltve!',
                'document' => $document,
            ], 200);
        }
        return response()->json([
            'message' => 'A fájl nem található vagy érvénytelen.',
        ], 422);
    }
    public function getDocumentumById($teacherId)
    {

        $documents = DB::table('documents as d')
            ->join('performance_goals as p', 'd.performanceGoal', '=', 'p.id')
            ->join('users as u', 'p.teacher', '=', 'u.id')
            ->join('aspect_items as ai', 'p.aspect_item', '=', 'ai.id')
            ->where('p.teacher', '=', $teacherId) // Teacher ID szűrése
            ->select('u.name as teacher_name', 'ai.name as aspect_item_name', 'd.document_name', 'd.document_path')
            ->get();
        return response()->json($documents);
    }
}
