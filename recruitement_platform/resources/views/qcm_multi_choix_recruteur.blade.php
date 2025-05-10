<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire Recruteur - QCM</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: #f1f8ff;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Montserrat', sans-serif;
      height: 100vh;
      flex-direction: column;
      position: relative;
    }

    .logo {
      color: black;
      font-weight: bold;
      font-size: 2em;
      text-decoration: none;
      position: absolute;
      top: 70px;
      left: 50%;
      transform: translateX(-50%);
      text-align: center;
    }

    .logo span {
      color: #6EC7E8;
    }

    .form-box {
      background: white;
      padding: 25px;
      border-radius: 12px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      text-align: center;
      animation: fadeIn 0.4s ease-in-out;
      margin-top: 60px;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h3 {
      margin-bottom: 8px;
      color: #6EC7E8;
    }

    .step-title {
      font-weight: bold;
      font-size: 16px;
      margin: 15px 0 8px;
      color: #6EC7E8;
    }

    .options, .input-group {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
      margin-bottom: 15px;
    }

    .option {
      padding: 8px 14px;
      border: 2px solid #6EC7E8;
      border-radius: 20px;
      background: white;
      color: #6EC7E8;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
      user-select: none;
    }

    .option:hover, .option.selected {
      background: #6EC7E8;
      color: white;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      border: 2px solid #6EC7E8;
      border-radius: 10px;
      font-size: 14px;
    }

    .btn {
      background-color: #6EC7E8;
      border: none;
      padding: 12px;
      color: white;
      border-radius: 50px;
      font-size: 14px;
      cursor: pointer;
      transition: background 0.3s ease-in-out;
      width: 100%;
      text-transform: uppercase;
    }

    .btn:hover {
      background-color: #5bbbd7;
    }

    .hidden {
      display: none;
    }
  </style>
</head>
<body>

<h2 class="logo"><span>J</span>obSmart</h2>

<div class="form-box">
  <!-- Étape 1 -->
  <div id="step-1" class="step">
    <h3>Bienvenue Recruteur !</h3>
    <p>Quelques infos rapides pour mieux vous orienter.</p>
    <div class="step-title">Poste à pourvoir</div>
    <div class="input-group">
      <input type="text" id="poste" placeholder="Ex : Développeur Web">
    </div>
    <div class="step-title">Nom de votre entreprise</div>
    <div class="input-group">
      <input type="text" id="entreprise" placeholder="Nom de l'entreprise">
    </div>
    <button class="btn" onclick="nextStep(1)">Suivant</button>
  </div>

  <!-- Étape 2 -->
  <div id="step-2" class="step hidden">
    <h3>Merci !</h3>
    <p>Type de profil recherché</p>
    <div class="options">
      <div class="option">Junior</div>
      <div class="option">Confirmé</div>
      <div class="option">Senior</div>
    </div>
    <button class="btn" onclick="nextStep(2)">Suivant</button>
  </div>

  <!-- Étape 3 -->
  <div id="step-3" class="step hidden">
    <h3>Presque fini !</h3>
    <p>Type de contrat proposé</p>
    <div class="options">
      <div class="option">CDI</div>
      <div class="option">CDD</div>
      <div class="option">Stage</div>
      <div class="option">Freelance</div>
    </div>
    <button class="btn" onclick="nextStep(3)">Suivant</button>
  </div>

  <!-- Étape 4 -->
  <div id="step-4" class="step hidden">
    <h3>Parfait !</h3>
    <p>Lieu du poste</p>
    <div class="options">
      <div class="option">Paris</div>
      <div class="option">Lyon</div>
      <div class="option">Marseille</div>
      <div class="option">Télétravail</div>
    </div>
    <button class="btn" onclick="validateForm()">Valider</button>
  </div>
</div>

<script>
  function nextStep(current) {
    document.getElementById(`step-${current}`).classList.add('hidden');
    document.getElementById(`step-${current + 1}`).classList.remove('hidden');
  }

  function validateForm() {
    alert("Merci ! Votre demande a bien été enregistrée.");
    window.location.href = "tableaudebord_recruteur.php";
  }

  // Gestion de la sélection des options
  document.querySelectorAll('.options').forEach(group => {
    group.querySelectorAll('.option').forEach(option => {
      option.addEventListener('click', () => {
        group.querySelectorAll('.option').forEach(opt => opt.classList.remove('selected'));
        option.classList.add('selected');
      });
    });
  });
</script>

</body>
</html>
