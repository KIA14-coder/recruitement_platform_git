<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .candidat-container {
        background-color: white;
        border: 2px solid #4cb4e7;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        padding: 30px;
        max-width: 700px;
        margin: 40px auto;
        text-align: left;
    }

    .candidat-container h2 {
        color: #4cb4e7;
        text-align: center;
        margin-bottom: 25px;
    }

    .candidat-container p {
        margin: 10px 0;
        font-size: 16px;
    }

    .candidat-container a {
        color: #4cb4e7;
        text-decoration: underline;
    }
</style>
</head>

<body>
    <div class="candidat-container">
    <h2>Informations du candidat</h2>
    <p><strong>Nom :</strong> {{ $candidat->name }}</p>
    <p><strong>Email :</strong> {{ $candidat->email }}</p>
    <p><strong>CV :</strong> <a href="{{ asset('storage/' . $candidat->cv) }}" target="_blank">Voir le CV</a></p>
    <p><strong>Lettre de motivation :</strong> <a href="{{ asset('storage/' . $candidat->lettre_motivation) }}" target="_blank">Voir la lettre</a></p>
</div>
</body>
</html>