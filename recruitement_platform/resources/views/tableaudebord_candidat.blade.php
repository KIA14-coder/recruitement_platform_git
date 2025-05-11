<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <title>Dashboard Candidat - JobSmart</title>
  <style>
    .search-bar {
      display: flex;
      align-items: center;
      background: #eef6fb;
      border-radius: 30px;
      padding: 6px 14px;
      border: 1px solid #b0d8f1;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
      transition: box-shadow 0.3s;
    }

    .search-bar:focus-within {
      box-shadow: 0 0 0 2px #4cb4e7;
    }

    .search-icon {
      margin-right: 8px;
      color: #4cb4e7;
      font-size: 1.2rem;
    }

    #searchInput {
      border: none;
      background: transparent;
      outline: none;
      font-size: 14px;
      width: 180px;
    }
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f7ff;
      margin: 0;
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
    .menu-icon {
      font-size: 24px;
      cursor: pointer;
      user-select: none;
    }
    .dropdown-menu {
      position: absolute;
      top: 70px;
      right: 20px;
      background: white;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      display: none;
      flex-direction: column;
      min-width: 160px;
      z-index: 999;
    }
    .dropdown-menu a {
      padding: 12px;
      text-decoration: none;
      color: #333;
      border-bottom: 1px solid #eee;
      transition: background 0.2s;
    }
    .dropdown-menu a:hover {
      background-color: #f0f0f0;
    }

    .container {
      text-align: center;
      padding: 30px 20px;
    }
    .card {
      background-color: white;
      border: 2px solid #4cb4e7;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 20px;
      max-width: 700px;
      margin: 0 auto;
    }
    .card img {
      width: 200px;
      margin-bottom: 20px;
    }
    .card p {
      text-align: left;
      margin: 6px 0;
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
    .counter {
      margin-top: 15px;
      color: #333;
    }
    
  </style>
</head>
<body>

<div class="header">
  <div><h2 class="logo"><span>J</span>obSmart</h2></div>
  <div style="display: flex; align-items: center; gap: 20px;">
    <div class="search-bar">
      <i class="bi bi-search search-icon"></i>
      <input type="text" id="searchInput" placeholder="Rechercher des offres..." oninput="filtrerOffres()">
    </div>
    Bonjour, Alice
    <div class="menu-icon" onclick="toggleMenu()">☰</div>
  </div>

  <div class="dropdown-menu" id="dropdownMenu">
    <a href="">Paramètres</a>
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

<div class="container">
  <h2>Offres suggérées</h2>
  <div id="offre-card" class="card"></div>
<div class="btn-group">
  <button class="btn" onclick="sauvegarder()">Sauvegarder</button>
  <button class="btn" onclick="postuler()">Postuler</button>
  <button class="btn" onclick="pasInteresse()" style="background-color: gray;">Pas intéressé</button>
</div>
  <div class="counter" id="compteur"></div>
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
  let offres = [];
  let index = 0;

  function afficherOffre() {
    if (index < offres.length) {
      const o = offres[index];
      document.getElementById("offre-card").innerHTML = `
        <p><strong>Poste:</strong> ${o.titre}</p>
        <p><strong>Entreprise:</strong> ${o.entreprise}</p>
        <p><strong>Lieu:</strong> ${o.lieu}</p>
        <p><strong>Salaire:</strong> ${o.salaire ?? 'Non précisé'}</p>
        <p><strong>Contrat:</strong> ${o.type_contrat}</p>
        <p><strong>Horaires:</strong> ${o.Horaires}</p>
        <p><strong>Télétravail:</strong> ${o.teletravail}</p>
        <p><strong>Description:</strong> ${o.description}</p>
      `;
      document.getElementById("compteur").innerText = "Offre " + (index + 1) + " sur " + offres.length;
    } else {
      document.getElementById("offre-card").innerHTML = "<p><strong>Vous avez consulté toutes les offres disponibles.</strong></p>";
      document.querySelector(".btn-group").style.display = "none";
      document.getElementById("compteur").innerText = "";
    }
  }

  function sauvegarder() {
    index++;
    afficherOffre();
  }

  function postuler() {
    index++;
    afficherOffre();
  }

  function toggleMenu() {
    const menu = document.getElementById("dropdownMenu");
    menu.style.display = menu.style.display === "flex" ? "none" : "flex";
  }

  document.addEventListener("DOMContentLoaded", function () {
    fetch("/candidat/get-all-jobs")
    .then(res => res.json())
    .then(data => {
      offres = data;
      afficherOffre();
  });

  });

  function pasInteresse() {
  index++;
  afficherOffre();
  }

  // Cacher le menu si on clique ailleurs
  document.addEventListener("click", function (e) {
    const menu = document.getElementById("dropdownMenu");
    const icon = document.querySelector(".menu-icon");
    if (!menu.contains(e.target) && !icon.contains(e.target)) {
      menu.style.display = "none";
    }
  });
</script>

</body>
</html>
