<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Recruteur</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f1f8ff;
    }
    .header {
      display: flex;
      justify-content: space-between;
      padding: 20px;
      background: white;
      border-bottom: 1px solid #ccc;
    }
    .container {
      padding: 20px;
      text-align: center;
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
    .card {
      display: none;
      justify-content: center;
      align-items: center;
      background: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      margin-top: 30px;
      width: 60%;
      margin-left: auto;
      margin-right: auto;
    }
    .card.active {
      display: flex;
    }
    .cv-img {
      width: 200px;
      margin-right: 30px;
    }
    .infos {
      text-align: left;
    }
    .infos p {
      margin: 8px 0;
    }
    .btn {
      padding: 10px 20px;
      margin: 10px;
      background-color: red;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    .btn:hover {
      background-color: darkred;
    }
    .footer-menu {
      display: flex;
      justify-content: space-around;
      padding: 15px;
      background: #eaf5ff;
      position: fixed;
      width: 100%;
      bottom: 0;
    }
    .footer-menu a {
      text-decoration: none;
      color: #6EC7E8;
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
  <h2 class="logo"><span>J</span>obSmart</h2>
  
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
  </div>

  <div class="container">
    <h2>Candidats</h2>
    <div id="cards">
      <!-- Candidat 1 -->
      <div class="card active">
        <img src="cv_sample.png" alt="CV Candidat" class="cv-img">
        <div class="infos">
          <p><strong>Poste:</strong> Développeur Web</p>
          <p><strong>Lieu:</strong> Paris</p>
          <p><strong>Type:</strong> CDI</p>
          <button class="btn" onclick="accepterCandidat()">Accepter</button>
          <button class="btn" onclick="refuserCandidat()">Refuser</button>
        </div>
      </div>
      <!-- Candidat 2 -->
      <div class="card">
        <img src="cv_sample.png" alt="CV Candidat" class="cv-img">
        <div class="infos">
          <p><strong>Poste:</strong> UX Designer</p>
          <p><strong>Lieu:</strong> Lyon</p>
          <p><strong>Type:</strong> CDD</p>
          <button class="btn" onclick="accepterCandidat()">Accepter</button>
          <button class="btn" onclick="refuserCandidat()">Refuser</button>
        </div>
      </div>
      <!-- Candidat 3 -->
      <div class="card">
        <img src="cv_sample.png" alt="CV Candidat" class="cv-img">
        <div class="infos">
          <p><strong>Poste:</strong> Data Analyst</p>
          <p><strong>Lieu:</strong> Marseille</p>
          <p><strong>Type:</strong> Stage</p>
          <button class="btn" onclick="accepterCandidat()">Accepter</button>
          <button class="btn" onclick="refuserCandidat()">Refuser</button>
        </div>
      </div>
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
    let index = 0;
    const cards = document.querySelectorAll('.card');

    function updateDisplay() {
      cards.forEach((card, i) => {
        card.classList.toggle('active', i === index);
      });
    }

    function accepterCandidat() {
      alert("Candidat accepté et ajouté au suivi ✨");
      suivant();
    }

    function refuserCandidat() {
      alert("Candidat refusé ❌");
      suivant();
    }

    function suivant() {
      if (index < cards.length - 1) {
        index++;
        updateDisplay();
      } else {
        alert("Fin de la liste des candidats");
      }
    }

    document.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') suivant();
    });
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
