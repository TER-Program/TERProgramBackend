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


    // A form megjelenítése
    public function create()
    {
        // Lekérdezzük a performance goals-t a select mezőhöz
        $performanceGoals = PerformanceGoal::all();
        return view('documents.create', compact('performanceGoals'));
    }

    // A fájl feltöltésének logikája
    public function store(Request $request)
    {
        // Validálás
        $request->validate([
            'document_name' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf,doc,docx,txt|max:10240', // Korlátozva a típusok és a méret
            'performanceGoal' => 'required|exists:performance_goals,id',
        ]);

        // A fájl feltöltése
        $path = $request->file('document')->store('documents', 'public');

        // A dokumentum mentése az adatbázisba
        Document::create([
            'document_name' => $request->input('document_name'),
            'document_path' => $path,
            'performanceGoal' => $request->input('performanceGoal'),
        ]);

        // Visszairányítás egy sikeres üzenettel
        return redirect()->route('documents.create')->with('success', 'Dokumentum sikeresen feltöltve!');
    }
}
