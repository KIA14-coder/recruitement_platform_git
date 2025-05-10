<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>✏️ Modifier Profil</title>
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

    .card label {
      font-weight: bold;
      color: #4cb4e7;
      display: block;
      margin-top: 15px;
    }

    .card input,
    .card textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .card input:focus,
    .card textarea:focus {
      outline: none;
      border: 1px solid #4cb4e7;
      box-shadow: 0 0 5px rgba(76, 180, 231, 0.4);
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
      border: none;
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
  <h2>✏️ Modifier Mon Profil</h2>

  <form action="enregistrer_modifications.php" method="post" enctype="multipart/form-data" class="card">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="Alice Ngono" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="alice@gmail.com" required>

    <label for="ville">Ville :</label>
    <input type="text" id="ville" name="ville" value="Douala">

    <label for="competences">Compétences :</label>
    <input type="text" id="competences" name="competences" value="HTML, CSS, Python">

    <label for="formation">Formation :</label>
    <textarea id="formation" name="formation" rows="3" placeholder="Exemple : Licence en Informatique à l’Université de Douala (2018 - 2021)"></textarea>

    <label for="experience">Expérience :</label>
    <textarea id="experience" name="experience" rows="3" placeholder="Exemple : Développeuse Front-End chez XYZ Tech (2021 - 2023)"></textarea>

    <label for="cv">CV (PDF) :</label>
    <input type="file" id="cv" name="cv" accept=".pdf">

    <label for="lettre_motivation">Lettre de motivation (PDF) :</label>
    <input type="file" id="lettre_motivation" name="lettre_motivation" accept=".pdf">

    <button type="submit" class="btn">Enregistrer</button>
  </form>
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
