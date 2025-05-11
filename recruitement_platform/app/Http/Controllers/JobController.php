<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobCreated;
use App\Models\JobSaved;
use App\Models\Candidat;
use App\Models\User;
use App\Models\Employeur;

class JobController extends Controller
{
    public function index()
    {
        $employeurId = session('employeur_id');
        $offres = JobCreated::where('employeur_id', $employeurId)->latest()->get();

        return view('offre_recruteur', compact('offres'));
    }

    public function allJobs()
    {
        $offres = JobCreated::where('statut', 'ouvert')->latest()->get();
        return response()->json($offres);
    }

    // 🔸 Créer une offre
    public function store(Request $request)
    {
        $employeur = Employeur::find(session('employeur_id'));

        if (!$employeur) {
            return redirect()->route('connexion.recruteur')->with('error', 'Session expirée, veuillez vous reconnecter.');
        }
        // ⚠️ Sécurité : assure-toi que c'est bien un employeur
        // if (!$user || !$employeur || $user->role !== 'employeur') {
        //     abort(403, 'Seuls les employeurs peuvent créer des offres.');
        // }

        $validated = $request->validate([
            'url' => 'nullable|string|max:255',
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'type_contrat' => 'required|in:CDI,CDD,Interim,Stage,Alternance',
            'Horaires' => 'required|in:temps_plein,temps_partel,week-ends',
            'teletravail' => 'required|in:Oui,Non',
            'salaire' => 'nullable|numeric',
            'lieu' => 'required|string|max:255',
            'date_expiration' => 'nullable|date',
        ]);

        $job = JobCreated::create([
            ...$validated,
            'entreprise' => $employeur->nom_entreprise,
            'employeur_id' => $employeur->id,
        ]);

        return redirect()->route('dashboard.recruteur')->with('success', 'Offre publiée avec succès.');
    }

    // 🔸 Voir une offre
    public function show(string $id)
    {
        $job = JobCreated::findOrFail($id);
        return response()->json($job);
    }

    // 🔸 Modifier une offre
    public function update(Request $request, string $id)
    {
        $job = JobCreated::findOrFail($id);
        $user = User::find($request->input('user_id'));
        $employeur = Employeur::find(session('employeur_id'));

        if (!$user || !$employeur || $user->role !== 'employeur' || $employeur->id !== $job->employeur_id) {
            abort(403, 'Vous ne pouvez modifier que vos propres offres.');
        }

        $validated = $request->validate([
            'url' => 'sometimes|string|max:255',
            'entreprise' => 'sometimes|string|max:255',
            'titre' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'type_contrat' => 'sometimes|in:CDI,CDD,Interim,Stage,Alternance',
            'Horaires' => 'sometimes|in:temps_plein,temps_partel,week-ends',
            'teletravail' => 'sometimes|in:Oui,Non',
            'salaire' => 'nullable|numeric',
            'lieu' => 'sometimes|string|max:255',
            'date_expiration' => 'nullable|date',
            'statut' => 'sometimes|in:ouvert,fermé'
        ]);

        $job->update($validated);

        return response()->json(['message' => 'Offre mise à jour', 'job' => $job]);
    }

    // 🔸 Supprimer une offre
    public function destroy(string $id)
    {
        $employeur = Employeur::find(session('employeur_id'));

        if (!$employeur) {
            return redirect()->route('connexion.recruteur')->with('error', 'Session expirée, veuillez vous reconnecter.');
        }

        $job = JobCreated::findOrFail($id);

        if ($employeur->id !== $job->employeur_id) {
            abort(403, 'Vous ne pouvez supprimer que vos propres offres.');
        }

        $job->delete();

        return redirect()->route('dashboard.recruteur')->with('success', 'Offre supprimée.');
    }



    public function saveJob(Request $request)
    {
        $candidatId = session('candidat_id'); // 👈 assure-toi que ce champ existe bien dans la session

        if (!$candidatId) {
            return response()->json(['error' => 'Non connecté'], 401);
        }

        $jobId = $request->input('job_id');

        $exists = JobSaved::where('candidat_id', $candidatId)
                        ->where('job_id', $jobId)
                        ->exists();

        if ($exists) {
            return response()->json(['message' => 'Déjà sauvegardée']);
        }

        JobSaved::create([
            'candidat_id' => $candidatId,
            'job_id' => $jobId,
        ]);

        return response()->json(['message' => 'Offre sauvegardée']);
    }
}
