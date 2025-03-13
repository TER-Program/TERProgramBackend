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
    // Ellenőrizzük, hogy a request tartalmazza-e a fájlt és a performanceGoal paramétert
    \Log::info('Request data:', $request->all());

    // Validáció
    $request->validate([
        'pdf' => 'required|file|mimes:pdf|max:10240', // A fájl max 10MB
        'performanceGoal' => 'required|exists:performance_goals,id', // A performanceGoal ID validálása
    ]);

    // Ha a fájl validált, akkor itt következik a fájl kezelés
    if ($request->hasFile('pdf') && $request->file('pdf')->isValid()) {
        $file = $request->file('pdf');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('documents', $fileName, 'public');
        
        // Dokumentum mentése
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

    
}




