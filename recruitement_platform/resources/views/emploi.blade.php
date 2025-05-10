<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>📌 Ajouter une offre</title>
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
      max-width: 600px;
      margin: 40px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color:  #6EC7E8;
      margin-bottom: 30px;
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

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    select,
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    textarea {
      height: 120px;
    }

    button {
      width: 100%;
      background-color:  #6EC7E8;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
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
        <div> <h2 class="logo"><span>J</span>obSmart</h2></div>
        <div>
        Bonjour, {{ $employeur->nom_entreprise ?? 'Entreprise inconnue' }}
        <p>Employeur ID : {{ $employeur->id }}</p>
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
  @if ($errors->any())
          <div style="color: red; margin-bottom: 10px; font-weight: bold;">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
  @endif
  <h2> Ajouter une offre d'emploi</h2>

  <form method="POST" action="{{ route('offres.store') }}">
  @csrf

  <!-- <label for="url">Lien vers l’offre (URL)</label>
  <input type="text" id="url" name="url" required> -->

  <label for="titre">Titre du poste</label>
  <input type="text" id="titre" name="titre" required>

  <label for="lieu">Lieu</label>
  <input type="text" id="lieu" name="lieu" required>

  <label for="type_contrat">Type de contrat</label>
  <select id="type_contrat" name="type_contrat" required>
    <option value="CDI">CDI</option>
    <option value="CDD">CDD</option>
    <option value="Interim">Intérim</option>
    <option value="Stage">Stage</option>
    <option value="Alternance">Alternance</option>
  </select>

  <label for="Horaires">Horaires</label>
  <select id="Horaires" name="Horaires">
    <option value="temps_plein">Temps plein</option>
    <option value="temps_partel">Temps partiel</option>
    <option value="week-ends">Week-ends</option>
  </select>

  <label for="teletravail">Télétravail</label>
  <select id="teletravail" name="teletravail">
    <option value="Oui">Oui</option>
    <option value="Non">Non</option>
  </select>

  <label for="salaire">Salaire (€)</label>
  <input type="text" id="salaire" name="salaire">

  <label for="description">Description</label>
  <textarea id="description" name="description" required></textarea>

  <button type="submit">Publier l'offre</button>
</form>

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
