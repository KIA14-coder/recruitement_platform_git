<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>👤 Mon Profil</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f0f7ff;
    }

    .header {
      display: flex;
      justify-content: space-between;
      padding: 10px;
      background: white;
      border-bottom: 1px solid #4cb4e7;
      position: relative;
    }

    .logo {
      color: black;
      font-weight: bold;
      font-size: 2em;
      text-decoration: none;
      margin-bottom: 10px;
      margin-top: 3px;
    }

    .logo span {
      color: #6EC7E8;
    }

    .container {
      padding: 30px 20px;
      text-align: center;
    }

    .card {
      background-color: white;
      border: 2px solid #4cb4e7;
      border-radius: 12px;
      padding: 30px;
      max-width: 600px;
      margin: 0 auto;
      box-shadow: 0 0 8px #4cb4e7;
      text-align: left;
    }

    .card p {
      font-size: 16px;
      margin: 10px 0;
    }

    .card strong {
      color: #4cb4e7;
    }

    .btn {
      display: inline-block;
      margin-top: 20px;
      background-color: #4cb4e7;
      color: white;
      padding: 10px 20px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
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
  <div><h2 class="logo"><span>J</span>obSmart</h2></div>
  <div>
    Bonjour, Alice
    <span class="menu-icon" onclick="toggleMenu()">☰</span>
    <div id="dropdownMenu" class="dropdown-menu">
      <a href="#">Paramètres</a>
      <a href="#">Historique</a>
      <a href="#">Aide</a>
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
  <h2><span class="yayi">👤</span> Mon Profil</h2>

  <div class="card">
    <p><strong>Nom :</strong> Alice Ngono</p>
    <p><strong>Email :</strong> alice@gmail.com</p>
    <p><strong>Ville :</strong> Douala</p>
    <p><strong>Compétences :</strong> HTML, CSS, Python</p>
    <p><strong>Formation :</strong> Licence en Informatique à l’Université de Douala (2018 - 2021)</p>
    <p><strong>Expérience :</strong> Développeuse Front-End chez XYZ Tech (2021 - 2023)</p>
    <p><strong>CV :</strong> <a href="uploads/cv_alice.pdf" target="_blank">📎 Télécharger</a></p>
    <p><strong>Lettre de motivation :</strong> <a href="uploads/lettre_alice.pdf" target="_blank">📎 Télécharger</a></p>

    <a href="modifier_profil.php" class="btn">Modifier</a>
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
