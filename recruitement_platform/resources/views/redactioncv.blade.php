<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Créateur de CV & Lettre de Motivation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    :root {
      --primary: #6EC7E8;
      --background: #f9fafb;
      --text: #1f2937;
      --radius: 12px;
      --shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Inter', sans-serif;
      background: var(--background);
      color: var(--text);
      padding: 2rem;
    }
    header {
      text-align: center;
      margin-bottom: 2rem;
    }
    header h1 {
      font-size: 2rem;
      color: var(--primary);
    }
    .tabs {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-bottom: 2rem;
    }
    .tab-button {
      padding: 0.5rem 1rem;
      border: 1px solid #6EC7E8;
      border-radius: var(--radius);
      background: white;
      box-shadow: var(--shadow);
      cursor: pointer;
      font-weight: bold;
      color: #6EC7E8;
    }
    .tab-button.active {
      background: var(--primary);
      color: white;
    }
    .tab-content {
      display: none;
    }
    .tab-content.active {
      display: block;
    }
    main {
      display: flex;
      flex-direction: column;
      gap: 2rem;
    }
    @media(min-width: 768px) {
      main {
        flex-direction: row;
      }
    }
    section {
      background: white;
      padding: 2rem;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      flex: 1;
    }
    label {
      display: block;
      margin-bottom: 1rem;
      font-weight: 600;
    }
    input, textarea, select {
      width: 100%;
      padding: 0.75rem;
      margin-top: 0.25rem;
      border-radius: var(--radius);
      border: 1px solid #d1d5db;
      font-size: 1rem;
    }
    input:focus, textarea:focus, select:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
      transition: all 0.2s ease;
    }
    textarea {
      resize: vertical;
    }
    button {
      margin-top: 1rem;
      background: var(--primary);
      color: white;
      border: none;
      padding: 0.75rem 1.5rem;
      border-radius: var(--radius);
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s;
    }
    button:hover {
      background: #5db2d1;
    }
    #cv-output, #lm-output {
      border: 2px dashed #d1d5db;
      padding: 1.5rem;
      border-radius: var(--radius);
      min-height: 300px;
    }
  </style>
</head>
<body>
  <header>
    <h1><i class="fas fa-file-alt"></i> Générateur CV & Lettre de Motivation</h1>
  </header>

  <div class="tabs">
    <button class="tab-button active" onclick="switchTab('cv')">CV</button>
    <button class="tab-button" onclick="switchTab('lm')">Lettre de Motivation</button>
  </div>

  <!-- CV Tab -->
  <div id="cv" class="tab-content active">
    <main>
      <section>
        <h2>Personnalisation</h2>
        <label>Titre du CV:
          <input type="text" id="cvTitle" placeholder="Ex: Développeur Web">
        </label>

        <label>Couleur principale:
          <input type="color" id="cvColor" value="#4f46e5">
        </label>


        <label>Police:
          <select id="cvFont">
            <option value="Inter">Inter</option>
            <option value="Arial">Arial</option>
            <option value="Georgia">Georgia</option>
            <option value="Verdana">Verdana</option>
            <option value="Roboto">Roboto</option>
            <!-- Tu peux ajouter d'autres ici -->
          </select>
        </label>
        <label>Niveau d'études:
            <input type="text" id="niveau">
          </label>
          
          <label>Sexe:
            <select id="sexe">
              <option value="Homme">Homme</option>
              <option value="Femme">Femme</option>
              <option value="Non spécifié">Non spécifié</option>
            </select>
          </label>
          
          <label>Adresse:
            <input type="text" id="adresse" placeholder="Ex : 12 rue de Paris, 75000 Paris">
          </label>
          
          <label>Téléphone:
            <input type="tel" id="telephone" placeholder="+33 6 12 34 56 78">
          </label>
          
          <label>Profil LinkedIn:
            <input type="url" id="linkedin" placeholder="https://linkedin.com/in/ton-profil">
          </label>
          
          <label>Loisirs:
            <input type="text" id="loisirs" placeholder="Ex : Lecture, Sport, Voyages">
          </label>
          
          <label>Soft skills:
            <input type="text" id="softskills" placeholder="Ex : Travail en équipe, Communication">
          </label>
      </section>

      <section>
        <h2>Informations</h2>
        <label>Nom: <input type="text" id="nom"></label>
        <label>Prénom: <input type="text" id="prenom"></label>
        <label>Email: <input type="email" id="email"></label>
        <label>Résumé: <textarea id="resume" rows="3"></textarea></label>
        <label>Expériences: <textarea id="experiences" rows="4"></textarea></label>
        <label>Compétences: <textarea id="competences" rows="3"></textarea></label>
        <button onclick="genererCV()"><i class="fas fa-magic"></i> Générer CV</button>
      </section>

      <section>
        <h2>Aperçu CV</h2>
        <div id="cv-output"></div>
        <button onclick="telechargerPDF('cv-output', 'cv.pdf')"><i class="fas fa-download"></i> Télécharger CV</button>
      </section>
    </main>
  </div>

  <!-- Lettre de Motivation Tab -->
  <div id="lm" class="tab-content">
    <main>
      <section>
        <h2>Lettre de Motivation</h2>
        <label>Nom & Prénom: <input type="text" id="lmNomPrenom" placeholder="Jean Dupont"></label>
        <label>Poste visé: <input type="text" id="lmPoste" placeholder="Ex: Développeur Web"></label>
        <label>Entreprise: <input type="text" id="lmEntreprise" placeholder="Ex: OpenAI France"></label>
        <label>Message: <textarea id="lmMessage" rows="6" placeholder="Pourquoi vous voulez ce poste..."></textarea></label>
        <button onclick="genererLM()"><i class="fas fa-magic"></i> Générer LM</button>
      </section>

      <section>
        <h2>Aperçu Lettre</h2>
        <div id="lm-output"></div>
        <button onclick="telechargerPDF('lm-output', 'lettre-motivation.pdf')"><i class="fas fa-download"></i> Télécharger LM</button>
      </section>
    </main>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <script>
    function switchTab(tab) {
      document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
      document.querySelectorAll('.tab-content').forEach(tc => tc.classList.remove('active'));
      document.getElementById(tab).classList.add('active');
      event.target.classList.add('active');
    }

    function genererCV() {
  const output = document.getElementById("cv-output");
  const title = document.getElementById("cvTitle").value;
  const color = document.getElementById("cvColor").value;
  const font = document.getElementById("cvFont").value;

  const nom = document.getElementById("nom").value;
  const prenom = document.getElementById("prenom").value;
  const email = document.getElementById("email").value;
  const resume = document.getElementById("resume").value;
  const experiences = document.getElementById("experiences").value;
  const competences = document.getElementById("competences").value;

  const niveau = document.getElementById("niveau").value;
  const sexe = document.getElementById("sexe").value;
  const adresse = document.getElementById("adresse").value;
  const telephone = document.getElementById("telephone").value;
  const linkedin = document.getElementById("linkedin").value;
  const loisirs = document.getElementById("loisirs").value;
  const softskills = document.getElementById("softskills").value;

  output.style.fontFamily = font;
  output.innerHTML = `
    <div style="background-color: #f0f4f8; padding: 2rem; border-radius: 12px;">
      <h1 style="color:${color}; margin-bottom: 0.5rem;">${title}</h1>
      <h2 style="margin-bottom: 0.25rem;">${prenom} ${nom}</h2>
      <p><strong>Sexe :</strong> ${sexe}</p>
      <p><strong>Niveau d'études :</strong> ${niveau}</p>
      <p><strong>Email :</strong> ${email}</p>
      <p><strong>Téléphone :</strong> ${telephone}</p>
      <p><strong>Adresse :</strong> ${adresse}</p>
      <p><strong>LinkedIn :</strong> <a href="${linkedin}" target="_blank">${linkedin}</a></p>

      <hr style="margin: 1rem 0; border-color: ${color};">

      <p><strong>Résumé :</strong><br>${resume.replace(/\n/g, "<br>")}</p>

      <h3 style="color:${color}; margin-top: 1.5rem;">Expériences</h3>
      <p>${experiences.replace(/\n/g, '<br>')}</p>

      <h3 style="color:${color}; margin-top: 1.5rem;">Compétences</h3>
      <p>${competences.replace(/\n/g, '<br>')}</p>

      <h3 style="color:${color}; margin-top: 1.5rem;">Soft Skills</h3>
      <p>${softskills}</p>

      <h3 style="color:${color}; margin-top: 1.5rem;">Loisirs</h3>
      <p>${loisirs}</p>
    </div>
  `;
}


function genererLM() {
  const output = document.getElementById("lm-output");
  const nomPrenom = document.getElementById("lmNomPrenom").value;
  const poste = document.getElementById("lmPoste").value;
  const entreprise = document.getElementById("lmEntreprise").value;
  const message = document.getElementById("lmMessage").value;

  // On récupère le genre depuis la section CV
  const sexe = document.getElementById("sexe").value;
  const estFemme = sexe === "Femme";

  const accorde = (masculin, feminin) => estFemme ? feminin : masculin;

  output.innerHTML = `
    <p>À l'attention du recruteur,</p>

    <p>Actuellement à la recherche d'une nouvelle opportunité professionnelle, je me permets de vous adresser ma candidature pour le poste de <strong>${poste}</strong> au sein de <strong>${entreprise}</strong>. Ce poste représente pour moi une réelle opportunité d’évoluer dans un environnement stimulant et en phase avec mes compétences.</p>

    <p>Fort${accorde('', 'e')} de plusieurs expériences dans des environnements similaires, j’ai pu développer des compétences concrètes en lien direct avec les missions proposées : rigueur, autonomie, sens de l’initiative et esprit d’équipe. Je suis convaincu${accorde('', 'e')} que mon profil peut rapidement s’intégrer et apporter une valeur ajoutée à vos équipes.</p>

    <p>Je serais ravi${accorde('', 'e')} de pouvoir échanger avec vous pour vous exposer plus en détail mes motivations et vous démontrer ma réelle envie de contribuer activement aux projets de <strong>${entreprise}</strong>.</p>

    <p>Dans l’attente de votre retour, je vous prie d’agréer, Madame, Monsieur, l’expression de mes salutations distinguées.</p>

    <p><strong>${nomPrenom}</strong></p>
  `;
}

    function telechargerPDF(elementId, filename) {
      const element = document.getElementById(elementId);
      html2pdf().from(element).save(filename);
    }
  </script>
</body>
</html>
