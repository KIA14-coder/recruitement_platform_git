@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .container {
        padding: 30px 20px;
    }

    .candidature-card {
        background-color: white;
        border: 2px solid #4cb4e7;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        padding: 20px;
        margin-bottom: 20px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .candidature-card p {
        margin: 8px 0;
        text-align: left;
    }

    .candidature-card a {
        color: #4cb4e7;
        text-decoration: underline;
    }

    h2 {
        color: #4cb4e7;
        text-align: center;
        margin-bottom: 30px;
    }
</style>

<div class="container">
    <h2>Candidatures reçues</h2>
    @forelse($candidatures as $candidature)
        <div class="candidature-card">
            <p><strong>Poste :</strong> {{ $candidature->offre->titre }}</p>
            <p><strong>Lieu :</strong> {{ $candidature->offre->lieu }}</p>
            <p><strong>Type :</strong> {{ $candidature->offre->type_contrat }}</p>
            <p><strong>Candidat :</strong> <a href="{{ route('candidat.info', $candidature->user->id) }}">{{ $candidature->user->name }}</a></p>
            <p><strong>CV :</strong> <a href="{{ asset('storage/' . $candidature->cv) }}" target="_blank">Voir le CV</a></p>
            <p><strong>Lettre de motivation :</strong> <a href="{{ asset('storage/' . $candidature->lettre_motivation) }}" target="_blank">Voir la lettre</a></p>
        </div>
    @empty
        <p style="text-align:center;">Aucune candidature reçue.</p>
    @endforelse
</div>
@endsection
