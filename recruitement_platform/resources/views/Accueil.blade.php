
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
     
    <title>Accueil</title>
    <style>
        
*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: 'poppins', sans-serif;
    scroll-behavior: smooth;
}

p{
    font-weight: 300;
    color: #111;
}

header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 15px 10px;
    background: #fff; /* Fond blanc pour qu'il soit visible sur toutes les pages */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease;
}

header .logo {
    color: #000; /* Texte noir */
    margin-left:40px;
}

header .navbar a {
    color: #000; /* Liens en noir pour être bien visibles */
    text-decoration: none;
    margin-left: 30px;
    font-weight: 700;
    margin-right:15px;
}
.accueil{
    color: #6EC7E8 !important; /* Changement de couleur au survol */
    border-bottom: 2px solid #6EC7E8;  
}

header .navbar a:hover {
    color: #6EC7E8; /* Changement de couleur au survol */
    border-bottom: 2px solid #6EC7E8;
}

header .btn-reserve {
    background: #6EC7E8;
    color: white !important;
    padding: 10px 20px;
    text-transform: uppercase;
}

header .btn-reserve:hover {
    background: #5bb0d4;
}

.logo{
    color: #fff;
    font-weight: bold;
    font-size: 2em;
    text-decoration: none;
    margin-bottom:20px;
}
.logo span{
    color:#6EC7E8;
}

.navbar{
    display: flex;
    position: relative;
}
.navbar li{
    list-style: none;
}
.navbar a{
    color: #fff;
    text-decoration: none;
    margin-left: 30px;
    font-weight: 700;
}

.btn-reserve{
    padding: 10px 20px;
    background:#6EC7E8;
   margin-top: -10px;
   text-transform:uppercase ;
}

.btn-reserve:hover{
    background:#6EC7E8;
    transition: ease-out;
}

header .navbar li a:hover{
    color:#6EC7E8;
    border-bottom: 2px solid #6EC7E8;
}

.banniere{
    position: relative;
    width: 100%;
    min-height: 98vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: url(./images/pageheader-banner.jpg);
    background-size: cover;
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
.banniere .contenu{
    max-width: 70%;
    text-align: center;
}
.banniere .contenu h2{
    color: #fff;
    font-size: 3em;
    text-transform: capitalize;
}
.contenu p:nth-child(2){
    color: #ffff;
    font-size: 1.2em;
}

.btn1{
    font-size: 1em;
    color: white;
    background-color: #6EC7E8;
    padding: 10px 20px;
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;
    letter-spacing: 2px;
    transition: 0.5s;
    margin-left: 10px;
    ;
}
.btn2{
    font-size: 1em;
    color: #fff;
    background: #6EC7E8;
    padding: 10px 20px;
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;

    letter-spacing: 2px;
    transition: 0.5s;
    margin-left: 10px;
}

.btn1:hover{
letter-spacing: 4px;
}
section{
    padding: 100px;
}
.service-card {
  transition: all 0.3s ease;
  background-color: #fff;
}

.service-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.row{
    position: relative;
    width: 100%;
    display: flex;
    justify-content: space-between;
}

.row .col50{
    position: relative;
    width: 48%;
    justify-content: center;
    align-items: center;

}

.row .col50 h2{
    margin-bottom: 20px;
}

.titre-texte{
    color: #000;
    font-size: 2em;
    font-weight: 300px;
    text-transform: capitalize;
}

.titre-texte span{
    color: #6EC7E8;
    font-size: 1.5em;
    font-weight: 700px;
}

.row .col50 img{
    height: 450px;
    width: 600px;
    position: relative;
}

            
            .features {
                padding: 60px 20px;
            }
            .feature-icon {
                font-size: 3rem;
                color:  #6EC7E8;
                margin-bottom: 15px;
            }
.defile {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh;
    background-color: #f4f4f4;
    overflow: hidden;
    margin: 0;
}

.marquee {
    width: 100%;
    overflow: hidden;
    white-space: nowrap;
    position: relative;
}

.marquee-content {
    display: inline-block;
    animation: marquee 15s linear infinite;
}

.marquee-content img {
    height: 80px;
    margin: 0 20px;
}

@keyframes marquee {
    from { transform: translateX(100%); }
    to { transform: translateX(-100%); }
}
.titre{
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}


.expert{
    margin-top:-100px;
}

.expert .contenu{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 40px;
}

.expert .contenu .box{
    width: 250px;
    margin: 15px;
}
.expert .contenu .box img{
    position: relative;
    width: 100%;
    height: 300px;
    top: 0;
    left: 0;
    object-fit: cover;
}

.expert .contenu .box h3{
    color: #111;
    font-weight: 400;
    text-align: center;
}

.container2 {
      padding: 20px 20px;
      text-align: center;
    }

    .titre1 {
      font-size: 2.7em;
      color: #6EC7E8;
    }

    p.subtitle {
      color: #64748b;
      margin-bottom: 40px;
      font-size: 20px;
    }

    .reviews {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .review-card {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08); /* plus forte ombre */
      max-width: 350px;
      height: 500px;
      padding: 20px;
      text-align: left;
      transition: transform 0.3s ease;
    }

    .review-card:hover {
      transform: translateY(-5px);
    }

    .review-card:nth-child(2) {
      margin-top: 30px; /* décalage de la 2e carte */
    }

    #reve {
      height: 550px;
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 10px;
    }

    .user-info img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }

    .username {
      font-weight: bold;
    }

    .date {
      color: #6b7280;
      font-size: 0.9em;
    }

    .stars {
      color: #facc15;
      margin: 10px 0;
      font-size: 22px;
      text-align: center;
    }

    .comment {
      border-left: 3px solid #6EC7E8;
      padding-left: 10px;
      color: #334155;
      font-size: 1.3em;
    }

    #comment1 {
      font-size: 1.3em;
      height: 300px;
    }

    @media (max-width: 768px) {
      .reviews {
        flex-direction: column;
        align-items: center;
      }

      .review-card:nth-child(2) {
        margin-top: 0;
      }
    }
.contact{
    background-image: url(./images/img-form.jpg);
    background-size: cover;
    box-shadow: 2px 2px 12px rgba(0,0,0, 0.8);
    width: 100%;
    background-position: unset;
}

.contactform{
    padding: 75px 50px;
    background: #fff;
    box-shadow: 5px 15px 50px rgba(0,0,0, 0.8);
    max-width: 500px;
    margin-top: 50px;
    justify-content: center;
    align-items: center;
    margin-left: 38%;
}

.contactform .inputboite{
    position: relative;
    width: 100%;
    margin-bottom: 20px;
}

.contactform h3{
    color: #111;
    font-size: 1.2em;
    margin-bottom: 20px;
}

.contactform .inputboite input,
.contactform .inputboite textarea{
    width: 100%;
    border: 1px solid #555;
    padding: 10px;
    color: #111;
    outline: none;
    font-size: 16px;
    font-weight: 300;
    resize: none;
}

.contactform .inputboite input[type="submit"]{
    font-size: 1em;
    font-weight: 700;
    color: #ffff;
    background: #6EC7E8;
    display: inline-block;
    cursor: pointer;
    text-transform: uppercase;
    text-decoration: none;
    letter-spacing: 2px;
    outline: none;
    border: none;
    transition: 0.5s;
    max-width: 120px;
    align-items: center;
    justify-content: center;
}

.copyright{
    padding: 20px 40px;
    border-top: 2px solid rgba(0,0,0, 0.1);
    background: rgba(228,222,222,);
    text-align: center;
}

.copyright p:nth-child(1){
    color: #333;
}

.copyright a {
    color: #fb911f;
    text-decoration: none;
    font-weight: 600;
    font-style: italic;
}

.contact .titre-text span{
    color: #6EC7E8;
    font-size: 2em;
}

header.sticky{
    background: #fff;
    padding: 10px 10px;
    box-shadow: 0px 5px 20px rgba(0,0,0, 0.05);
}

header.sticky .logo{
    color: #000;
}

header.sticky .navbar li a {
    color: #000;
}

header.sticky li a:hover{
    color:#6EC7E8;
    border-bottom: 2px solid #6EC7E8;
}

@media (max-width: 991px) {
header, 
header.sticky{
    padding: 10px 20px;
}

header .navbar li{
    margin-left: 0px;
}

header .navbar li a {
    text-decoration: none;
    color: #111;
    font-size: 1.6em;
    font-weight: 300;
}

.navbar{
    display: none;
}
section{
    padding: 20px;
}
header .navbar.active{
    width: 100%;
    height: calc(100% -68px);
    position: fixed;
    top: 68px;
    left:0;
    display: flex;
    justify-content: center;
    flex-direction: column;
    background: #ffff;
    align-items: center;
}


.menuToggle{
    position: relative;
    width: 40px;
    height: 40px;
    background-image: url(./images/menu.png);
    background-repeat: no-repeat;
    background-position: center;
    cursor: pointer;
    background-size: 30px;
}


.menuToggle.active
{
    background-image: url(./images/close.png);
    background-size: 25px;
    background-repeat: no-repeat;
    background-origin: center;
}

header.sticky .menuToggle{
    filter: invert(1);
}


.banniere .contenu h2{
    font-size: 2em;
}

.row .col50 img{
    margin-left: 18%;
}

.contenu p:nth-child(2){
    font-size: 1.2em;
}
.expert{
    margin-top: 0px;
}

.menu{
    margin-top: 0px;
}

.row{
    display: flex;
    flex-direction: column;
}



.temoignage h2{
    font-size: 2em;
    text-align: center;
}

.temoignage p{
text-align: center;
}

.contactform{
    margin-left: 25%;
}


    .row .col50 {
        position: relative;
        width: 100%;
        justify-content: center;
        align-items: center;
        margin-bottom: 30px;
    
    }

    .row{
        flex-direction: column;
    }
}

@media (max-width: 480px)
{
    .banniere .contenu h2{
        font-size: 2.2em;
        color: #fff;
    }

    .titre-text{
        color: #000;
        font-size: 2rem;
        font-weight: 300;
        text-transform: capitalize;
    }

    .temoignage h2 
    {
        font-size: 1.1em;
    }

    .temoignage p{
        text-align: center;
    }

}
.bi-star-fill {
            color: #FFD700;
            font-size: 18px;
        }
        .hero-image {
            flex: 1;
            text-align: right;
            position: relative;
        }
        .hero-image img {
            max-width: 100%;
            height: auto;
            padding: 10px;
            border-radius: 10px;
            position: relative;
            height: 400px;  /* Ajustez la hauteur selon vos besoins */
             object-fit: cover; /* Pour éviter la déformation et remplir le conteneur */
             
            top: 70px; /* Déplace légèrement l'image vers le bas */
}
i{
    color:#6EC7E8;
}
.hero {
            background: #6EC7E8;
            padding: 20px 10px;
            color: #fff;
            text-align: right;
            position: relative;
            top: 100px;
        }
        .tools-section {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 60px 40px;
    gap: 60px;
    flex-wrap: wrap;
    width: 100%;
}

.tool-card {
    max-width: 400px;
    text-align: center;
    margin-right:100px ;
}

.tool-card img {
    width: 100%;
    max-width: 350px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.tool-card h2 {
    font-size: 24px;
    margin: 0 0 10px;
}

.tool-card p {
    font-size: 16px;
    margin-bottom: 20px;
}

.tool-card button {
    padding: 10px 20px;
    border: 3px solid #6EC7E8;
    background: transparent;
    border-radius: 50px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.tool-card button:hover {
    background: #6EC7E8;
    color: white;
}

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color:black;
            font-weight:bold;
        }
        .hero-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .hero-text {
            flex: 1;
            text-align: left;
        }
        .hero-image {
            flex: 1;
            text-align: right;
            position: relative;
        }
        .hero-image img {
            max-width: 100%;
            height: auto;
            padding: 10px;
            border-radius: 10px;
            position: relative;
            height: 400px;  /* Ajustez la hauteur selon vos besoins */
             object-fit: cover; /* Pour éviter la déformation et remplir le conteneur */
             
            top: 70px; } 
            .features {
            padding: 60px 20px;
               margin-top:200px;
        }
        .feature-icon {
            font-size: 3rem;
            color:  #6EC7E8;
            margin-bottom: 15px;
        }
        #chatbot-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #6EC7E8;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 999;
        }
        
        /* Fenêtre du chatbot */
        #chatbot {
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 300px;
            max-height: 400px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            display: none;
            flex-direction: column;
            overflow: hidden;
            z-index: 1000;
            font-family: sans-serif;
        }
        
        /* En-tête du chatbot */
        #chatbot-header {
            background: #6EC7E8;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        /* Messages */
        #chatbot-messages {
            padding: 10px;
            height: 250px;
            overflow-y: auto;
            font-size: 14px;
        }
        
        /* Formulaire d'envoi */
        #chatbot-form {
            display: flex;
            border-top: 1px solid #ccc;
        }
        
        #chatbot-input {
            flex: 1;
            padding: 10px;
            border: none;
            outline: none;
        }
        
        #chatbot-form button {
            background: #6EC7E8;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }
        .steps-container {
      max-width: 1200px;
      margin: auto;
      text-align: center;
    }

    .steps-container h2 {
      font-size: 22px;
      margin-bottom: 40px;
      color: #0e2e52;
    }

    .steps {
      display: flex;
      justify-content: space-around;
      gap: 20px;
      flex-wrap: wrap;
      margin-bottom: 40px;
    }

    .step {
      max-width: 300px;
      flex: 1;
      min-width: 250px;
    }

    .step img {
      max-width: 100%;
      height: auto;
      margin-bottom: 20px;
    }

    .step-number {
      background-color: #fde68a;
      color: #1f2937;
      font-weight: 600;
      padding: 4px 12px;
      border-radius: 6px;
      display: inline-block;
      margin-bottom: 10px;
    }

    .step p {
      font-size: 16px;
      color: #1f2937;
    }

    .btn-primary {
      background-color:#6EC7E8;
      color: white;
      font-weight: 600;
      font-size: 16px;
      padding: 14px 28px;
      border: none;
      border-radius: 32px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #005c5e;
    }
    </style>
<body>
<header>
    <a href="#" class="logo"><span>J</span>obSmart</a>
    <div class="menuToggle" onclick="toggleMenu();"></div>
    <ul class="navbar">
        <li><a href="#banniere" onclick="toggleMenu();" class="accueil">Accueil</a></li>
        <li><a href="#service" onclick="toggleMenu();">Nos Services</a></li>
        <li><a href="#entreprises" onclick="toggleMenu();">Nos entreprises</a></li>
        <li><a href="#expert" onclick="toggleMenu();">CV & Lettre</a></li>
        <li><a href="#temoignage" onclick="toggleMenu();">Temoignage</a></li> 
       <li> <div  style="font-size: 30px; color:#6EC7E8; margin-left:4px;" class="menu-icon" onclick="toggleMenu()">☰</div>

<div class="dropdown-menu" id="dropdownMenu">
  <a href="{{ route('inscription.choix') }}">S'inscrire</a>
  <a href="{{ route('connexion.choix') }}">Se connecter</a>
  <a href="#">Paramètres</a>
  <a href="#">Aide</a>
  <a href="#">Langue</a>
  <a href="{{ route('home') }}" style="color:red">Déconnexion</a>
</div>
</li>
</header>
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Trouvez le job fait pour vous</h1>
                <p>Découvrez des offres personnalisées <br>
                selon votre profil</p>
                <a href="{{ route('connexion.candidat') }}?role=candidat" class="btn btn-light text-primary me-3">Je recherche un emploi</a>
                <a href="{{ route('connexion.recruteur') }}?role=recruteur" class="btn btn-outline-light">Je recrute</a>
            </div>
            <div class="hero-image">
                <img src="images/accueil.png" alt="Homme avec ordinateur">
            </div>
        </div>
    </div>
</section>

   
</section>
<section class="features py-5 bg-light text-center" id="service">
<h2 class="titre-texte">Nos <span>S</span>ervices</h2>
<div class="row g-4">
        <div class="col-md-4">
          <div class="service-card p-4 shadow-sm rounded-4 h-100">
            <div class="feature-icon mb-3 text-primary fs-1">
              <i class="bi bi-search"></i>
            </div>
            <h4 class="mb-2">Recherche ciblée</h4>
            <p class="text-muted">Trouvez facilement les offres qui vous correspondent.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-card p-4 shadow-sm rounded-4 h-100">
            <div class="feature-icon mb-3 text-primary fs-1">
              <i class="bi bi-person-badge"></i>
            </div>
            <h4 class="mb-2">Profils adaptés</h4>
            <p class="text-muted">Gagnez en visibilité auprès des recruteurs.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-card p-4 shadow-sm rounded-4 h-100">
            <div class="feature-icon mb-3 text-primary fs-1">
              <i class="bi bi-lightbulb"></i>
            </div>
            <h4 class="mb-2">Conseils carrière</h4>
            <p class="text-muted">Profitez de ressources pour guider votre carrière.</p>
          </div>
        </div>
      </div>
    </div>
</section>
<section class="defile" id="entreprises">
    <div class="marquee">
        <div class="marquee-content">
            <img src="./images/total.jpg" alt="Google">
            <img src="./images/sfr.jpg" alt="Apple">
            <img src="./images/orange.jpg" alt="Microsoft">
            <img src="./images/auchan.jpg" alt="Amazon">
            <img src="./images/zara.jpg" alt="Facebook">
            <img src="./images/nike.jpg" alt="Tesla">
            <img src="./images/facebook.jpg" alt="Nike">
            <img src="./images/sam.jpg" alt="Adidas">
            <img src="./images/amazon.jpg" alt="Samsung">
            <img src="./images/adis.jpg" alt="Sony">
            <img src="./images/apple.jpg" alt="Sony">
            <img src="./images/sncf.jpg" alt="Sony">   
            <img src="./images/leclerc.jpg" alt="Sony">   
            <img src="./images/sephora.jpg" alt="Sony">
            <img src="./images/hp.jpg" alt="Sony">
            <img src="./images/LG.jpg" alt="Sony">
            <img src="./images/Huawei.jpg" alt="Sony">
            <img src="./images/carrefour.jpg" alt="Sony">
            <img src="./images/pepsi.jpg" alt="Sony">
            <img src="./images/hm.jpg" alt="Sony">
            <img src="./images/disney.jpg" alt="Sony">
            <img src="./images/champion.jpg" alt="Sony">
            <img src="./images/bnp.jpg" alt="Sony">

        </div>
    </div>
    </section>

<!--<section class="expert" id="expert">-->
<section class="tools-section" id="expert">
    <div class="titre">
        <h2 class="titre-texte"><span>C</span>v & <span>L</span>ettre de <span>M</span>otivation</h2>
    </div>
    <div class="steps-container">
    <h2>Réalisez un CV parfait grâce à nos modèles et à leurs mises en page professionnelles.</h2>

    <div class="steps">
      <div class="step">
        <img src="1.png" alt="Étape 1">
        <div class="step-number">1</div>
        <p>Sélectionnez un modèle de CV parmi nos 35 modèles personnalisables.</p>
      </div>

      <div class="step">
        <img src="2.png" alt="Étape 2">
        <div class="step-number">2</div>
        <p>Ajoutez des contenus pré-rédigés par des experts (plus de 58 000 contenus disponibles).</p>
      </div>

      <div class="step">
        <img src="3.png" alt="Étape 3">
        <div class="step-number">3</div>
        <p>Téléchargez au format PDF ou Word et commencez à postuler.</p>
      </div>
    </div>

    <a href="redactioncv.php"><button class="btn-primary">Créer mon CV & Lettre de motivation</button></a>
  </div>

    </section>
  <section class="temoignage" id="temoignage">
 <div class="container2">
 <h2 class="titre-texte"><span>V</span>otre <span>A</span>vis <span> C</span>ompte</h2>
    <p class="subtitle">Découvrez les dernières avis de nos utilisateurs</p>
    <div class="reviews">

      <div class="review-card">
        <div class="user-info">
          <img src="https://cdn-icons-png.flaticon.com/512/236/236831.png" alt="user1" />
          <div>
            <div class="username">Lison chavanelle</div>
            <div class="date">10 avril 2025</div>
          </div>
        </div>
        <div class="stars">
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
        </div>
        <div class="comment">
          Mon mari ne peut plus s'en passer ! Il a eu beaucoup de mal à apprendre le dev et depuis qu’il a découvert ce site, tout devient beaucoup plus facile. Les cours sont géniaux et très bien expliqués. Je remercie la personne qui a créé ce site, car il est très facile d’utilisation et complet. Bravo 👏🏼
        </div>
      </div>

      <div id="reve" class="review-card">
        <div class="user-info">
          <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="kais" />
          <div>
            <div class="username">Kaïs GUOUGUENI BENEDDINE</div>
            <div class="date">04 avril 2025</div>
          </div>
        </div>
        <div class="stars">
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
        </div>
        <div id="comment1" class="comment">
          Application magnifique ! La refonte du site est juste magnifique, très moderne, les cours sont juste parfait pour chaque personne qui souhaite apprendre à coder ou perfectionner ses acquis.
        </div>
      </div>

      <div class="review-card">
        <div class="user-info">
          <img src="https://randomuser.me/api/portraits/men/99.jpg" alt="francky" />
          <div>
            <div class="username">Francky “LeGeny”</div>
            <div class="date">10 avril 2025</div>
          </div>
        </div>
        <div class="stars">
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
        </div>
        <div class="comment">
          Franchement incroyable rien à dire, que ça soit la facilité avec laquelle j'ai comprit et apprit le code ! A l'époque ça m'avait sauvé pour mes examens ! Je recommande les yeux fermés.
        </div>
      </div>

    </div>
  </div>

  <script>
    console.log("Section des avis chargée !");
  </script>
 </section>
 
 <div class="copyright">
     <p>copyright 2021 <a href="#">Yao kevin</a> youtube tutoriel. Tous droits reservé</p>
 </div>
 <script type="text/javascript">
     window.addEventListener('scroll', function(){
         const header =document.querySelector('header');
         header.classList.toggle("sticky", window.scrollY > 0 );
     });

   
 </script>
    <!-- Bouton flottant pour ouvrir le chatbot -->
<button id="chatbot-toggle">💬</button>

<!-- Fenêtre du chatbot -->
<div id="chatbot">
    <div id="chatbot-header">
        <span>Chatbot</span>
        <button id="close-chatbot">✖</button>
    </div>
    <div id="chatbot-messages"></div>
    <form id="chatbot-form">
        <input type="text" id="chatbot-input" placeholder="Écris un message..." autocomplete="off" />
        <button type="submit">➤</button>
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
    document.getElementById('chatbot-toggle').addEventListener('click', () => {
        document.getElementById('chatbot').style.display = 'flex';
    });
    
    document.getElementById('close-chatbot').addEventListener('click', () => {
        document.getElementById('chatbot').style.display = 'none';
    });
    
    document.getElementById('chatbot-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const input = document.getElementById('chatbot-input');
    const message = input.value.trim();
    if (!message) return;

    addMessage('Vous', message);
    input.value = '';
    
    // Ajouter un indicateur de chargement
    const loadingMsg = document.createElement('div');
    loadingMsg.innerHTML = '<strong>Bot:</strong> <em>Réfléchit...</em>';
    const container = document.getElementById('chatbot-messages');
    container.appendChild(loadingMsg);
    container.scrollTop = container.scrollHeight;

    fetch('/chatbot', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ message })
    })
    .then(res => {
        if (!res.ok) throw new Error(res.statusText);
        return res.json();
    })
    .then(data => {
        // Supprimer le message de chargement
        container.removeChild(loadingMsg);
        addMessage('Bot', data.reply);
    })
    .catch(err => {
        container.removeChild(loadingMsg);
        addMessage('Bot', "Désolé, je n'ai pas pu traiter votre demande. Veuillez réessayer.");
        console.error('Erreur:', err);
    });
});

function addMessage(sender, text) {
    const container = document.getElementById('chatbot-messages');
    const msg = document.createElement('div');
    msg.innerHTML = `<strong>${sender}:</strong> ${text}`;
    container.appendChild(msg);
    container.scrollTop = container.scrollHeight;
}
    
    // function getBotResponse(input) {
    //     const lower = input.toLowerCase();
    //     if (lower.includes('bonjour')) return "Bonjour ! Comment puis-je vous aider ?";
    //     if (lower.includes('horaire')) return "Nos horaires sont de 9h à 18h, du lundi au vendredi.";
    //     if (lower.includes('merci')) return "Avec plaisir ! 😊";
    //     return "Je ne suis pas sûr de comprendre. Pouvez-vous reformuler ?";
    // }
    </script>
    
</body>
</html>