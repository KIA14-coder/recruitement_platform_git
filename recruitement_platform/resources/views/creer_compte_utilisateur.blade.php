<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <title>Formulaire</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet" />

  <!-- <script type="module">
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-app.js";
  import { getAuth, signInWithEmailAndPassword,createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-auth.js";

  const firebaseConfig = {
    apiKey: "AIzaSyCZeFJbRjgKla9HO7shlRXq-aC1RKKm_NM",
    authDomain: "auth-53db4.firebaseapp.com",
    projectId: "auth-53db4",
    appId: "1:965707710980:web:caaf8fb4f556d90598eb51"
  };

  const app = initializeApp(firebaseConfig);
  const auth = getAuth(app);

  const container = document.getElementById('container');
  const loginButton = document.getElementById('login');
  const signUpButton = document.getElementById('signUp');

  signUpButton.addEventListener('click', () => {
    container.classList.add('panel-active');
  }); 

  loginButton.addEventListener('click', () => {
    container.classList.remove('panel-active');
  });

  async function firebaseSignup() {

    const form = document.getElementById('signupForm');

    const email = document.querySelector('input[name="email"]').value.trim();
    const password = document.querySelector('input[name="password"]').value.trim();
    const passwordConfirm = document.querySelector('input[name="password_confirmation"]').value.trim();

    if (!email || !password || !passwordConfirm) {
      alert("Veuillez remplir tous les champs.");
      return;
    }

    if (password !== passwordConfirm) {
      alert("Les mots de passe ne correspondent pas.");
      return;
    }

    try {
      const userCredential = await createUserWithEmailAndPassword(auth, email, password);
      alert("Compte Firebase créé avec succès !");
      document.getElementById('signupForm').submit(); // Laravel form submission
    } catch (error) {
      console.error(error);
      alert("Erreur lors de l'inscription Firebase : " + error.message);
    }
  }; -->

  </script>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: #f1f8ff;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      font-family: 'Montserrat', sans-serif;
      height: 100vh;
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
      font-size: 1em;
    }

    .container {
      position: relative;
      overflow: hidden;
      min-height: 600px;
      width: 768px;
      max-width: 100%;
      background-color: #fff;
      border-radius: 10px;
    }

    .form-container {
      position: absolute;
      top: 0;
      height: 100%;
      transition: .6s ease-in-out;
    }

    .sign-up-container {
      left: 0;
      width: 50%;
      opacity: 0;
      z-index: 1;
    }

    .container.panel-active .sign-up-container {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
      animation: show .6s;
    }

    @keyframes show {
      0%, 49.99% {
        opacity: 0;
        z-index: 1;
      }
      50%, 100% {
        opacity: 1;
        z-index: 5;
      }
    }

    .login-container {
      left: 0;
      width: 50%;
      z-index: 2;
    }

    .container.panel-active .login-container {
      transform: translateX(100%);
    }

    form {
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 50px;
      height: 100%;
      text-align: center;
    }

    input {
      background-color: white;
      border-radius: 10px;
      padding: 12px 15px;
      margin: 8px 0;
      width: 100%;
      border: 1px solid #6EC7E8;
    }
	input:focus, textarea:focus, select:focus {
      outline: none;
      border-color: #6EC7E8;
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
      transition: all 0.2s ease;
    }

    button {
      background-color: #6EC7E8;
      color: #00203f;
      border: 1px solid #6EC7E8;
      font-size: 16px;
      font-weight: bold;
      padding: 16px 32px;
      margin-top: 24px;
      letter-spacing: 1px;
      border-radius: 50px;
      transition: .2s ease-in;
    }

    button:hover {
      cursor: pointer;
      background-color: #6EC7E8;
      color: white;
      border: 2px solid white;
    }

    button:active {
      transform: scale(.95);
    }

    .social-container {
      margin: 24px 0;
    }

    .social-container a {
      display: inline-flex;
      justify-content: center;
      align-items: center;
      margin: 0 4px;
      height: 40px;
      width: 40px;
      border-radius: 50%;
      background-color: white;
      border: 1px solid #6EC7E8;
      color: #6EC7E8;
    }

    h1 {
      margin: 0;
      font-size: 24px;
    }

    span {
      font-size: 14px;
    }

    a {
      text-decoration: none;
      font-size: 14px;
      margin: 8px 0 16px;
      color: #333;
    }

    .overlay-container {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      z-index: 100;
      transition: transform .6s ease-in-out;
    }

    .container.panel-active .overlay-container {
      transform: translateX(-100%);
    }

    .overlay {
      background: #6EC7E8;
      color: #00203f;
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
      transform: translateX(0);
      transition: transform .6s ease-in-out;
    }

    .container.panel-active .overlay {
      transform: translateX(50%);
    }

    .overlay-panel {
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 40px;
      text-align: center;
      top: 0;
      height: 100%;
      width: 50%;
      transform: translateX(0);
      transition: transform .6s ease-in-out;
    }

    .overlay-left {
      transform: translateX(-20%);
    }

    .container.panel-active .overlay-left {
      transform: translateX(0);
    }

    .overlay-right {
      right: 0;
      transform: translateX(0);
    }

    .container.panel-active .overlay-right {
      transform: translateX(20%);
    }

    p {
      font-size: 14px;
      font-weight: 100;
      line-height: 20px;
      letter-spacing: .5px;
      margin: 20px 0 30px;
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
<h2 class="logo"><span>J</span>obSmart</h2>

<div class="container" id="container">
  <!-- Formulaire d'inscription -->
  <div class="form-container sign-up-container">
      
  <form action="{{ route('register.candidat') }}" method="POST" >
    @csrf
      <h1>Créer un compte</h1>
      <div class="social-container">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-google-plus-g"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <span>Utiliser compte gmail</span>
      <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Prénom" required />
      <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Nom" required />
      <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required />
      <input type="password" name="password" placeholder="Mot de passe" required />
      <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required />
      <input type="text" name="contact" value="{{ old('contact') }}" placeholder="Contact" required />

      <button type="submit" >Créer le compte</button>
          </form>
  </div>

  <!-- Formulaire de connexion -->
  <div class="form-container login-container">
    <form id="loginForm">
      @csrf
      <h1>Se connecter</h1>
      <div class="social-container">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-google-plus-g"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <span>Je n'ai pas de compte</span>
      <input type="email" id="login-email" placeholder="Email" required />
      <input type="password" id="login-password" placeholder="Mot de passe" required />
      <button type="submit" onclick="loginAccount()">Se connecter</button>
    </form>
  </div>

  <!-- Overlay -->
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>Bienvenue sur notre site</h1>
        <p>Nous offrons une expérience unique et des services de qualité.</p>
        <button class="ghost" id="login">Se connecter</button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1>Créez un compte dès aujourd'hui</h1>
        <p>Inscrivez-vous pour un accès rapide et sécurisé.</p>
        <button class="ghost" id="signUp">Créer un compte</button>
      </div>
    </div>
  </div>
</div>

@if ($errors->any())
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      document.getElementById('container').classList.add('panel-active');
    });
  </script>
@endif

<!-- JS -->
<script>
  const container = document.getElementById('container');
  const loginButton = document.getElementById('login');
  const signUpButton = document.getElementById('signUp');

  signUpButton.addEventListener('click', () => {
    container.classList.add('panel-active');
  }); 

  loginButton.addEventListener('click', () => {
    container.classList.remove('panel-active');
  });
</script>

</body>
</html>
