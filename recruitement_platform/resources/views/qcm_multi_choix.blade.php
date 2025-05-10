<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulaire Multi-Étapes</title>
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
      min-height: 100vh;
      flex-direction: column;
      padding: 20px;
    }

    .logo {
      color: black;
      font-weight: bold;
      font-size: 2em;
      text-decoration: none;
      margin-top: 20px;
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
      max-width: 450px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      text-align: center;
      animation: fadeIn 0.4s ease-in-out;
      margin-top: 20px;
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
      font-size: 14px;
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
      background-color: #56afd2;
    }

    .hidden {
      display: none;
    }

    .options.multiple .option.selected {
      background-color: #6EC7E8;
      color: white;
      border-color: #6EC7E8;
    }

    @media (max-width: 500px) {
      .option {
        font-size: 13px;
        padding: 6px 10px;
      }

      .form-box {
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <h2 class="logo"><span>J</span>obSmart</h2>

  <div class="form-box">
    <!-- Étape 1 -->
    <div id="step-1" class="step">
      <h3>Bienvenue 🎉</h3>
      <p>Personnalisez votre expérience en quelques étapes.</p>
      <div class="step-title">Poste recherché</div>
      <div class="input-group">
        <input type="text" id="poste" placeholder="Entrez le poste souhaité">
      </div>
      <div class="step-title">Années d'expérience</div>
      <div class="input-group">
        <input type="number" id="experience" min="0" placeholder="Nombre d'années">
      </div>
      <button class="btn" onclick="nextStep(1)">Suivant</button>
    </div>

    <!-- Étape 2 -->
    <div id="step-2" class="step hidden">
      <h3>Merci 🙏</h3>
      <p>Domaine recherché</p>
      <div class="step-title">Choisissez un ou plusieurs domaines</div>
      <div class="options multiple">
        <div class="option">Marketing</div>
        <div class="option">Développement</div>
        <div class="option">Design</div>
        <div class="option">Informatique</div>
        <div class="option">Réseaux sociaux</div>
        <div class="option">Photographie</div>
        <div class="option">Rédaction</div>
        <div class="option">Traduction</div>
        <div class="option">Finance</div>
        <div class="option">Gestion de projet</div>
        <div class="option">Ressources humaines</div>
        <div class="option">Service client</div>
        <div class="option">SEO</div>
        <div class="option">Cybersécurité</div>
        <div class="option">Blockchain</div>
        <div class="option">IA / Machine Learning</div>
        <div class="option">Data Science</div>
        <div class="option">Santé</div>
        <div class="option">Éducation</div>
        <div class="option">Vente</div>
        <div class="option">Logistique</div>
        <div class="option">Immobilier</div>
        <div class="option">Juridique</div>
      </div>
      <button class="btn" onclick="nextStep(2)">Suivant</button>
    </div>

    <!-- Étape 3 -->
    <div id="step-3" class="step hidden">
      <h3>Merci 🙏</h3>
      <div class="options">
  <div class="option">Brevet</div>
  <div class="option">CAP</div>
  <div class="option">BEP</div>
  <div class="option">Bac</div>
  <div class="option">Bac +1</div>
  <div class="option">Bac +2 (BTS/DUT)</div>
  <div class="option">Licence (Bac +3)</div>
  <div class="option">Master 1 (Bac +4)</div>
  <div class="option">Master 2 (Bac +5)</div>
  <div class="option">MBA</div>
  <div class="option">Doctorat (PhD)</div>
  <div class="option">Formation continue</div>
  <div class="option">Certifications (ex: Google, AWS...)</div>
  <div class="option">Autodidacte</div>
  </div>
  <button class="btn" onclick="nextStep(3)">Suivant</button>
</div>


    <!-- Étape 4 -->
    <div id="step-4" class="step hidden">
      <h3>Merci 🙏</h3>
      <p>Type de contrat</p>
      <div class="options">
      <div class="option">CDI</div>
  <div class="option">CDD</div>
  <div class="option">Stage</div>
  <div class="option">Alternance</div>
  <div class="option">Freelance</div>
  <div class="option">Intérim</div>
  <div class="option">Temps partiel</div>
  <div class="option">Temps plein</div>
      </div>
      <button class="btn" onclick="nextStep(4)">Suivant</button>
    </div>

    <!-- Étape 5 -->
    <div id="step-5" class="step hidden">
      <h3>Merci 🙏</h3>
      <p>Ville souhaitée</p>
      <div class="options">
      <div class="option">ile de France</div>
  <div class="option">Lyon</div>
  <div class="option">Marseille</div>
  <div class="option">Toulouse</div>
  <div class="option">Nice</div>
  <div class="option">Nantes</div>
  <div class="option">Strasbourg</div>
  <div class="option">Montpellier</div>
  <div class="option">Bordeaux</div>
  <div class="option">Lille</div>
  <div class="option">Rennes</div>
  <div class="option">Reims</div>
  <div class="option">Le Havre</div>
  <div class="option">Saint-Étienne</div>
  <div class="option">Grenoble</div>
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
      alert("Formulaire validé !");
      window.location.href = "tableaudebord_candidat.php";
    }

    // Gestion des clics sur les options
    document.querySelectorAll('.options').forEach(group => {
      const isMultiple = group.classList.contains('multiple');
      group.querySelectorAll('.option').forEach(option => {
        option.addEventListener('click', () => {
          if (!isMultiple) {
            group.querySelectorAll('.option').forEach(opt => opt.classList.remove('selected'));
            option.classList.add('selected');
          } else {
            option.classList.toggle('selected');
          }
        });
      });
    });
  </script>

</body>
</html>
