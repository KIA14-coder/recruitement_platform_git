<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidatApplying;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CandidatureController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données envoyées par l'utilisateur
        $request->validate([
            'cv' => 'required|file|mimes:pdf,docx|max:2048', // Validation du CV
            'lm' => 'nullable|file|mimes:pdf,docx|max:2048', // Validation de la LM
            'message' => 'nullable|string',
            'job_id' => 'required|exists:job_createds,id', // Vérifier si l'offre existe
        ]);

        // Sauvegarde du CV
        $cvPath = $request->file('cv')->store('cvs');
        
        // Sauvegarde de la LM (facultative)
        $lmPath = $request->file('lm') ? $request->file('lm')->store('lms') : null;

        // Création de la candidature
        CandidatApplying::create([
            'candidat_id' => Auth::id(), // ID de l'utilisateur authentifié
            'job_id' => $request->job_id,
            'cv_path' => $cvPath,
            'lm_path' => $lmPath,
            'message' => $request->message,
            'statut' => 'en attente',
        ]);

        return back()->with('success', 'Votre candidature a été envoyée avec succès.');
    }

    public function index()
    {
        $candidatures = CandidatApplying::where('candidat_id', Auth::id())->paginate(10);
        return view('candidature.index', compact('candidatures'));
    }

    // Autres méthodes pour l'acceptation, le refus, etc.
}
