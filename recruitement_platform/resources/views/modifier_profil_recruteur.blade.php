<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>✏️ Modifier Profil Recruteur</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f0f7ff;
    }

    .header {
  display: flex;
  justify-content: space-between;
  align-items: center; /* ✅ Centre verticalement */
  padding: 10px 20px;
  background: white;
  border-bottom: 1px solid #ccc;
}


    .logo {
      color: black;
      font-weight: bold;
      font-size: 2em;
      text-decoration: none;
    }

    .logo span {
      color: #6EC7E8;
    }

    .container {
      max-width: 500px;
      margin: 40px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #6EC7E8;
      margin-bottom: 30px;
    }

    label {
      font-weight: bold;
      color: #4cb4e7;
      display: block;
      margin-top: 15px;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .btn {
      display: block;
      margin-top: 25px;
      background-color: #6EC7E8;
      color: white;
      padding: 10px 25px;
      border-radius: 6px;
      font-weight: bold;
      border: none;
      cursor: pointer;
      text-align: center;
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
    Bonjour, Jean
    <span class="menu-icon" onclick="toggleMenu()">☰</span>
    <div id="dropdownMenu" class="dropdown-menu">
    <a href="{{ route('voir.offres') }}">Offres</a>
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
  <h2>✏️ Modifier Profil</h2>
  <form action="{{ route('dashboard.recruteur.profil') }}" method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="Jean Dupuis" required>

    <label for="entreprise">Entreprise :</label>
    <input type="text" id="entreprise" name="entreprise" value="TechCorp" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="jean@techcorp.com" required>

    <label for="poste">Poste :</label>
    <input type="text" id="poste" name="poste" placeholder="Ex. Responsable RH">

    <button type="submit" class="btn">Enregistrer</button>
  </form>

  <div class="footer-menu">
    <a href="{{ route('dashboard.recruteur') }}">Accueil</a>
    <a href="{{ route('dashboard.recruteur.entretiens') }}">Date d’entretiens</a>
    <a href="{{ route('dashboard.recruteur.suivi_candidats') }}">Suivis des candidats</a>
    <a href="{{ route('add.offres') }}">Ajouter un emploi</a>
    <a href="{{ route('dashboard.recruteur.profil') }}">Profil</a>
   
  </div>
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
