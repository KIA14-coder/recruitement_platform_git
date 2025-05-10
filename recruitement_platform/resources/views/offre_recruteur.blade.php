<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mes Offres - Recruteur</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f8ff;
      margin: 0;
      padding-bottom: 80px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
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
      padding: 20px;
    }

    h2 {
      color: #6EC7E8;
      text-align: center;
      margin-bottom: 20px;
    }

    .offre {
      background: white;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .offre p {
      margin: 8px 0;
    }

    .btn {
      padding: 10px 20px;
      margin: 10px 10px 0 0;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
    }

    .btn-modifier {
      background-color: #6EC7E8;
      color: white;
    }

    .btn-supprimer {
      background-color: #ff5c5c;
      color: white;
    }

    .btn-modifier:hover {
      background-color: #4cb4e7;
    }

    .btn-supprimer:hover {
      background-color: #cc0000;
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
    <div class="logo"><span>J</span>obSmart</div>

    @if(session('success'))
      <div style="color: green">{{ session('message') }}</div>
    @endif
    <div>Bonjour, Jean Dupuis
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
  <h2>📋 Mes Offres Publiées</h2>

  @foreach ($offres as $offre)
    <div class="offre">
      <p><strong>Poste :</strong>
        <a href="{{ route('offres.show', $offre->id) }}">
          {{ $offre->titre }}
        </a>
      </p>
      <p><strong>Lieu :</strong> {{ $offre->lieu }}</p>
      <p><strong>Type :</strong> {{ $offre->type_contrat }}</p>
      <p><strong>Date de publication :</strong> {{ $offre->date_publication->format('d/m/Y') }}</p>

      <form action="{{ route('offres.destroy', $offre->id) }}" method="POST" onsubmit="return confirm('Supprimer cette offre ?');">
        @csrf
        @method('DELETE')
        <button class="btn btn-supprimer" type="submit">Supprimer</button>
      </form>
    </div>
  @endforeach

  @if ($offres->isEmpty())
    <p style="text-align: center;">Aucune offre publiée pour le moment.</p>
  @endif
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
  