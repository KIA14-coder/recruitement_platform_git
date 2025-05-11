<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inscription Recruteur</title>
  <script type="module">
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-app.js";
  import { getAuth, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-auth.js";

  const firebaseConfig = {
    apiKey: "AIzaSyCZeFJbRjgKla9HO7shlRXq-aC1RKKm_NM",
    authDomain: "auth-53db4.firebaseapp.com",
    projectId: "auth-53db4",
    appId: "1:965707710980:web:caaf8fb4f556d90598eb51"
  };

  const app = initializeApp(firebaseConfig);
  const auth = getAuth(app);
  </script>
  <style>
    body {
      font-family: 'poppins', sans-serif;
      background-color: #f1f8ff;
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .logo {
      color: black;
      font-weight: bold;
      font-size: 2em;
      text-decoration: none;
      margin-bottom: 20px;
    }

    .logo span {
      color: #6EC7E8;
    }

    form {
      background-color: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      width: 400px;
    }

    input:focus, textarea:focus, select:focus {
      outline: none;
      border-color: #6EC7E8;
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
      transition: all 0.2s ease;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin: 10px 0 5px;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #6EC7E8;
      border-radius: 8px;
    }

    button {
      margin-top: 20px;
      width: 100%;
      background-color: #6EC7E8;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
    }

    button:hover {
      background-color: #50b6da;
    }

    .error {
      color: red;
      font-size: 0.9em;
      margin-top: 10px;
    }

    .have-account {
      margin-top: 20px;
      text-align: center;
      font-size: 14px;
    }

    .have-account a {
      color: #6EC7E8;
      text-decoration: none;
      font-weight: 600;
    }

    .have-account a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  @if ($errors->any())
        <div style="color: red; margin-bottom: 10px; font-weight: bold;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
  @endif
  <div class="container">
    <h2 class="logo"><span>J</span>obSmart</h2>

    <form action="{{ route('register.recruteur') }}" method="POST">

    @csrf
      <h2>Inscription Recruteur</h2>

      <!-- <label for="prenom">Prénom</label> -->
      <input type="text" id="prenom" name="first_name" value="{{ old('first_name') }}"  placeholder="Prénom" required /><br><br>

      <!-- <label for="nom">Nom</label> -->
      <input type="text" id="nom" name="last_name" value="{{ old('last_name') }}"  placeholder="Nom " required /><br><br>

      <!-- <label for="email">Email</label> -->
      <input type="email" id="email" name="email" value="{{ old('email') }}"  placeholder="Email" required /><br><br>

      <!-- <label for="password">Mot de passe</label> -->
      <input type="password" id="password" name="password" placeholder="Mot de passe"  required /><br><br>

      <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required /><br><br>

      <!-- <label for="entreprise">Nom de l'entreprise</label> -->
      <input type="text" id="entreprise" name="entreprise" value="{{ old('entreprise') }}" placeholder="Nom de l'entreprise" required /><br><br>

      <!-- <label for="telephone">Téléphone</label> -->
      <input type="tel" id="telephone" name="contact" value="{{ old('contact') }}" placeholder="Téléphone" required />

      <div id="error-message" class="error"></div>

      <button type="submit">S'inscrire</button>

      <div class="have-account">
        <p>Vous avez déjà un compte ? <a href="{{ route('connexion.recruteur') }}">Se connecter</a></p>
      </div>
    </form>
  </div>

  <!-- <script>
    const form = document.getElementById('recruiterForm');
    const errorMessage = document.getElementById('error-message');

    function firebaseSignupRecruteur() {
    const form = document.getElementById('recruiterForm');

    const email = form.email.value.trim();
    const password = form.password.value.trim();
    const passwordConfirm = form.password_confirmation.value.trim();

    if (!email || !password || !passwordConfirm) {
      alert("Veuillez remplir tous les champs.");
      return;
    }

    if (password !== passwordConfirm) {
      alert("Les mots de passe ne correspondent pas.");
      return;
    }

    firebase.auth().createUserWithEmailAndPassword(email, password)
      .then((userCredential) => {
        // Succès Firebase
        alert("Compte Firebase créé avec succès !");
        
        // Optionnel : envoyer les données au backend Laravel
        form.submit(); // envoie les autres infos à Laravel
      })
      .catch((error) => {
        console.error(error);
        alert("Erreur Firebase : " + error.message);
      });
  }
  </script> -->
  
</body>
</html>
