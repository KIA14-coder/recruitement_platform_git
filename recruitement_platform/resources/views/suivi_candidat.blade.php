<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>✅ Suivis des candidats</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f0f7ff;
    }

    .header {
      display: flex;
      justify-content: space-between;
      padding: 20px;
      background: white;
      border-bottom: 1px solid #ccc;
    }
    
    .container {
      max-width: 800px;
      margin: 40px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .logo{
    color: black;
    font-weight: bold;
    font-size: 2em;
    text-decoration: none;
    margin-bottom:10px;
    margin-top: 3px;
    
}
.logo span{
    color:#6EC7E8;
}


    h2 {
      text-align: center;
      color: #28a745;
      margin-bottom: 30px;
    }

    .candidat {
      padding: 15px;
      border-bottom: 1px solid #eee;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .candidat span {
      font-weight: bold;
      color: #333;
    }

    .candidat small {
      font-size: 12px;
      color: #777;
    }

    .footer-menu {
      display: flex;
      justify-content: space-around;
      padding: 15px;
      background: #eaf5ff;
      border-top: 1px solid #ccc;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    .footer-menu a {
      text-decoration: none;
      color: #6EC7E8;
      font-weight: bold;
    }

    .remove-btn {
      background: none;
      border: none;
      color: red;
      cursor: pointer;
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
    Bonjour, Jean Dupuis
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
  <h2>✅ Candidats Suivis</h2>

  <div class="candidat">
    <div>
      <span>Jean Lefèvre</span> - Développeur Web - Paris<br>
      <small>Date entretien : 5 Avril 2025</small>
    </div>
    <form method="post">
      <button class="remove-btn" title="Supprimer">&#10060;</button>
    </form>
  </div>

  <div class="candidat">
    <div>
      <span>Claire Michel</span> - UX Designer - Lyon<br>
      <small>Date entretien : 6 Avril 2025</small>
    </div>
    <form method="post">
      <button class="remove-btn" title="Supprimer">&#10060;</button>
    </form>
  </div>

</div>

  <div class="footer-menu">
      <a href="{{ route('dashboard.recruteur') }}">Accueil</a>
      <a href="{{ route('dashboard.recruteur.entretiens') }}">Date d’entretiens</a>
      <a href="{{ route('dashboard.recruteur.suivi_candidats') }}">Suivis des candidats</a>
      <a href="{{ route('add.offres') }}">Ajouter un emploi</a>
      <a href="{{ route('dashboard.recruteur.profil') }}">Profil</a>
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


