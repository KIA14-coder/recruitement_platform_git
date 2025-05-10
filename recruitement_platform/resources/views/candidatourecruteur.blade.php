<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription JobSmart</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f1f8ff;
            flex-direction: column;
            font-family: 'poppins', sans-serif;
        }
        .container {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 450px;
        }
        .logo{
    color: black;
    font-weight: bold;
    font-size: 2em;
    text-decoration: none;
    margin-bottom:20px;
    
}
.logo span{
    color:#6EC7E8;
}
        h3 {
            color: #333;
        }
        .option {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 10px;
            margin: 10px 0;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }
        .option:hover {
            border-color: #4cb4e7;
            transform: scale(1.05);
        }
        .option img {
            width: 60px;
            margin-right: 15px;
        }
        .option input {
            margin-right: 10px;
            height: 20px;
            width: 20px;
        }
        .option label {
            display: flex;
            flex-direction: column;
            cursor: pointer;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #6EC7E8;
            border: none;
            border-radius: 20px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        button:disabled {
            background: #6EC7E8;
            cursor: not-allowed;
        }
        button:hover:enabled {
            background: #6EC7E8;
        }
        small, label {
            color: #555;
        }
    </style>
</head>
<body>

<h2 class="logo"><span>J</span>obSmart</h2>

<div class="container">
    <h3>De quel type de compte avez-vous besoin ?*</h3>

    <div class="option" onclick="selectOption('jobseeker')">
        <input type="radio" name="account" id="jobseeker">
        <img src="./images/banni.jpg" alt="Chercheur d'emploi">
        <label for="jobseeker">
            <span class="gras" style="padding-left:0px;">Candidat</span>
            <small>Je recherche un emploi.</small>
        </label>
    </div>

    <div class="option" onclick="selectOption('employer')">
        <input type="radio" name="account" id="employer">
        <img src="./images/A.png" alt="Employeur"   style="width: 55px; height:50px;">
        <label for="employer">
        <span class="gras"  >Employeur</span>

            <small>Je recherche des candidat(e)s.</small>
        </label>
    </div>

    <button id="continueBtn" disabled onclick="redirectUser()">Continuer</button>
</div>

<script>
    function selectOption(option) {
        document.getElementById(option).checked = true;
        document.getElementById("continueBtn").disabled = false;
    }

    function redirectUser() {
        const selected = document.querySelector('input[name="account"]:checked');
        if (selected) {
            if (selected.id === "jobseeker") {
                window.location.href = "{{ route('inscription.candidat') }}?role=candidat";
            } else if (selected.id === "employer") {
                window.location.href = "{{ route('inscription.recruteur') }}?role=recruteur";
            }
        }
    }
</script>

</body>
</html>
