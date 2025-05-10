<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion - Choix du profil</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: #f1f8ff;
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .logo {
      color: black;
      font-weight: bold;
      font-size: 2em;
      text-decoration: none;
      margin-bottom: 25px;
    }
    .logo span {
    font-size: 50px;
      color: #6EC7E8;
    }
    .card {
      background-color: #fff;
      color: #333;
      border-radius: 16px;
      padding: 40px;
      width: 90%;
      max-width: 500px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      text-align: center;
      transition: transform 0.3s ease;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    h1 {
      font-size: 24px;
      margin-bottom: 24px;
    }
    .options {
      display: flex;
      gap: 20px;
      justify-content: center;
    }
    .option {
      flex: 1;
      padding: 20px;
      border-radius: 12px;
      border: 2px solid #6EC7E8;
      background-color: #f0f4ff;
      color: #6EC7E8;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s, color 0.3s;
    }
    .option:hover {
      background-color: #6EC7E8;
      color: #fff;
    }
  </style>
</head>
<body>
  <h2 class="logo"><span>J</span>obSmart</h2>
  <div class="card">
    <h1>Qui êtes-vous ?</h1>
    <div class="options">
      <div class="option" onclick="connectAs('candidat')">Candidat</div>
      <div class="option" onclick="connectAs('recruteur')">Recruteur</div>
    </div>
  </div>

  <script>
    function connectAs(type) {
    if (type === 'candidat') {
      window.location.href = "{{ route('connexion.candidat') }}";
    } else if (type === 'recruteur') {
      window.location.href = "{{ route('connexion.recruteur') }}";
    }
  }
  </script>
</body>
</html>
