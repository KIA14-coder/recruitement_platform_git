@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .form-container {
        background-color: white;
        border: 2px solid #4cb4e7;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        padding: 30px;
        max-width: 600px;
        margin: 40px auto;
        text-align: left;
    }

    .form-container h2 {
        color: #4cb4e7;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    .btn-primary {
        background-color: #4cb4e7;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: #3a9fcf;
    }
</style>

<div class="form-container">
    <h2>Postuler à l'offre : {{ $offre->titre }}</h2>
    <form action="{{ route('candidature.envoyer') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="offre_id" value="{{ $offre->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <div class="form-group">
            <label for="cv">CV :</label>
            <input type="file" name="cv" id="cv" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="lettre_motivation">Lettre de motivation :</label>
            <input type="file" name="lettre_motivation" id="lettre_motivation" class="form-control" required>
        </div>

        <button type="submit" class="btn-primary">Envoyer ma candidature</button>
    </form>
</div>
@endsection
