<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>📁 Offres sauvegardées</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f0f7ff;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background-color: white;
      border-bottom: 1px solid #ccc;
      position: relative;
    }

    .container {
      padding: 20px;
      text-align: center;
    }

    .card {
      display: flex;
      align-items: center;
      justify-content: space-around;
      background-color: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
      margin: 20px auto;
      width: 80%;
      border: 2px solid #4cb4e7;
    }

    .logo {
      width: 200px;
      height: auto;
      margin-right: 20px;
    }

    .logo1 {
      color: black;
      font-weight: bold;
      font-size: 2em;
      text-decoration: none;
      margin-bottom: 10px;
      margin-top: 3px;
    }

    .logo1 span {
      color: #6EC7E8;
    }

    .info {
      text-align: left;
      font-size: 16px;
    }

    .info p {
      margin: 5px 0;
    }

    .info strong {
      color: #333;
    }

    .btn-group {
      margin-top: 20px;
    }

    .btn {
      padding: 10px 20px;
      margin: 0 10px;
      border: none;
      border-radius: 6px;
      color: white;
      background-color: red;
      cursor: pointer;
      font-weight: bold;
    }

    .btn:hover {
      background-color: darkred;
    }

    .footer-menu {
      display: flex;
      justify-content: space-around;
      padding: 15px;
      background: #cce6ff;
      border-top: 1px solid #ccc;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    .footer-menu a {
      text-decoration: none;
      color: #4cb4e7;
      font-weight: bold;
    }

    .menu-icon {
      font-size: 24px;
      cursor: pointer;
      user-select: none;
      margin-left: 10px;
    }

    .dropdown-menu {
      position: absolute;
      top: 70px;
      right: 20px;
      background: white;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      flex-direction: column;
      min-width: 160px;
      z-index: 999;
      display: none;
    }

    .dropdown-menu.show {
      display: flex;
    }

    .dropdown-menu a {
      padding: 12px 16px;
      text-decoration: none;
      color: #333;
      border-bottom: 1px solid #eee;
    }

    .dropdown-menu a:hover {
      background-color: #f0f7ff;
    }
  </style>
</head>
<body>

<div class="header">
  <div><h2 class="logo1"><span>J</span>obSmart</h2></div>
  <div style="display: flex; align-items: center; gap: 10px; position: relative;">
    Bonjour, Alice
    <div class="menu-icon" onclick="toggleMenu()">☰</div>

    <div class="dropdown-menu" id="dropdownMenu">
      <a href="#">Paramètres</a>
      <a href="#">Aide</a>
      <a href="#">Historique</a>
      <a href="#">Langue</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:red">
      Déconnexion
      </a>
    </div>
  </div>
</div>

<div class="container">
  <h2>📁 Offres sauvegardées</h2>

  <div class="card">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Vinci_logo.svg/320px-Vinci_logo.svg.png" alt="Logo entreprise" class="logo">
    <div class="info">
      <p><strong>Poste:</strong> Développeur Web</p>
      <p><strong>Entreprise:</strong> Tech Africa</p>
      <p><strong>Lieu:</strong> Paris</p>
      <p><strong>Type:</strong> CDI</p>
      <p><strong>Compétences:</strong> React, Node.js</p>
      <p><strong>Mission:</strong> Conception et développement front & back</p>
      <div class="btn-group">
        <button class="btn">Voir</button>
        <button class="btn">Postuler</button>
      </div>
    </div>
  </div>
</div>

<div class="footer-menu">
  <a href="{{ route('dashboard.candidat') }}">Offres</a>
  <a href="{{ route('dashboard.candidat.offres_sauvegardees') }}">Sauvegardé</a>
  <a href="{{ route('dashboard.candidat.profil') }}">Profil</a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:red">
  Déconnexion
  </a>
</div>

<script>
  function toggleMenu() {
    const menu = document.getElementById("dropdownMenu");
    menu.classList.toggle("show");
  }

  document.addEventListener("click", function (e) {
    const menu = document.getElementById("dropdownMenu");
    const icon = document.querySelector(".menu-icon");
    if (!menu.contains(e.target) && !icon.contains(e.target)) {
      menu.classList.remove("show");
    }
  });
</script>

</body>
</html>
