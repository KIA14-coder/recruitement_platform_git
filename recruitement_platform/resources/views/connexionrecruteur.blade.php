<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion Recruteur</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: #f1f8ff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      color: #333;
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
    .card {
      background-color: #fff;
      padding: 40px;
      border-radius: 16px;
      width: 90%;
      max-width: 400px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      text-align: center;
    }
    h1 {
      font-size: 24px;
      margin-bottom: 24px;
    }
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 16px;
      border-radius: 8px;
      border: 1px solid #6EC7E8;
      font-size: 16px;
    }
    input:focus, textarea:focus, select:focus {
      outline: none;
      border-color: #6EC7E8;
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
      transition: all 0.2s ease;
    }
    button {
      width: 100%;
      padding: 12px;
      background-color: #6EC7E8;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
    }
    button:hover {
      background-color: #50b6da;
    }
    .signup-link {
      margin-top: 16px;
      font-size: 14px;
    }
    .signup-link a {
      color: #6EC7E8;
      text-decoration: none;
      font-weight: 600;
    }
    .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h2 class="logo"><span>J</span>obSmart</h2>
  <div class="card">

    @if(session('message'))
        <div style="color: green">{{ session('message') }}</div>
    @endif

    @if(session('error'))
      <div style="color: red; margin-bottom: 10px; font-weight: bold;">
        {{ session('error') }}
      </div>
    @endif
    <h1>Connexion Recruteur</h1>
      <form id="loginForm">
      @csrf
        <input type="email" id="email" placeholder="Adresse email" required>
        <input type="password" id="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
      </form>
    <div class="signup-link">
      Pas encore de compte ? <a href="{{ route('inscription.recruteur') }}">S'inscrire</a>
    </div>
  </div>
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

  document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    try {
      const userCredential = await signInWithEmailAndPassword(auth, email, password);
      const idToken = await userCredential.user.getIdToken();

      const response = await fetch("{{ route('auth.login') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ id_token: idToken })
      });

      const result = await response.text();
      if (response.redirected) {
        window.location.href = response.url;
      } else {
        alert(result);
      }

    } catch (error) {
      alert('Erreur : ' + error.message);
    }
  });
</script>
  
</body>
</html>
