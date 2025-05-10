<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dates des entretiens</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
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
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
          
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

        h2 {
            text-align: center;
            color: #6EC7E8;
            margin-bottom: 30px;
        }

        select {
            margin: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        #calendar {
            margin-top: 20px;
        }

        .popup {
            display: none;
            position: fixed;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            background: #ffffff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            z-index: 999;
            width: 300px;
        }

        .popup input, .popup button {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            font-size: 14px;
        }

        .popup button {
            background-color: #6EC7E8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup button:last-child {
            background-color: #ccc;
            color: black;
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
        <div><h2 class="logo"><span>J</span>obSmart</h2></div>
        <div>
    Bonjour, Jean Dupuis
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
    <h2>Dates des entretiens</h2>

    <label for="yearSelect">Choisir une année :</label>
    <select id="yearSelect"></select>
    <label for="monthSelect">Choisir un mois :</label>
    <select id="monthSelect"></select>

    <div id='calendar'></div>
</div>

<div class="popup" id="popup">
    <label for="appointmentTitle">Titre :</label>
    <input type="text" id="appointmentTitle" />

    <label for="candidateName">Nom du candidat :</label>
    <input type="text" id="candidateName" />

    <label for="appointmentTime">Heure :</label>
    <input type="time" id="appointmentTime" />

    <button onclick="saveAppointment()">Enregistrer</button>
    <button onclick="closePopup()">Annuler</button>
</div>

    <div class="footer-menu">
      <a href="{{ route('dashboard.recruteur') }}">Accueil</a>
      <a href="{{ route('dashboard.recruteur.entretiens') }}">Date d’entretiens</a>
      <a href="{{ route('dashboard.recruteur.suivi_candidats') }}">Suivis des candidats</a>
      <a href="{{ route('add.offres') }}">Ajouter un emploi</a>
      <a href="{{ route('dashboard.recruteur.profil') }}">Profil</a>
    </div>  

<script>
    let calendar;
    let selectedDate;
    let selectedEvent = null;

    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'fr',
            selectable: true,
            editable: true,
            eventClick: function(info) {
                selectedEvent = info.event;
                selectedDate = selectedEvent.startStr.split("T")[0];
                document.getElementById('appointmentTitle').value = selectedEvent.extendedProps.title || '';
                document.getElementById('candidateName').value = selectedEvent.title;
                document.getElementById('appointmentTime').value = selectedEvent.start.toISOString().substring(11, 16);
                document.getElementById("popup").style.display = 'block';
            },
            select: function(info) {
                selectedEvent = null;
                selectedDate = info.startStr;
                document.getElementById('appointmentTitle').value = '';
                document.getElementById('candidateName').value = '';
                document.getElementById('appointmentTime').value = '';
                document.getElementById("popup").style.display = 'block';
            }
        });
        calendar.render();

        const yearSelect = document.getElementById("yearSelect");
        const monthSelect = document.getElementById("monthSelect");
        const currentDate = new Date();

        for (let y = currentDate.getFullYear() - 5; y <= currentDate.getFullYear() + 5; y++) {
            let option = new Option(y, y);
            yearSelect.add(option);
        }
        yearSelect.value = currentDate.getFullYear();

        for (let i = 0; i < 12; i++) {
            let month = new Date(currentDate.getFullYear(), i, 1).toLocaleString("fr-FR", { month: "long" });
            let option = new Option(month, i);
            monthSelect.add(option);
        }
        monthSelect.value = currentDate.getMonth();

        function updateCalendar() {
            let newDate = new Date(yearSelect.value, monthSelect.value, 1);
            calendar.gotoDate(newDate);
        }

        yearSelect.addEventListener("change", updateCalendar);
        monthSelect.addEventListener("change", updateCalendar);
    });

    function saveAppointment() {
        let title = document.getElementById('appointmentTitle').value;
        let name = document.getElementById('candidateName').value;
        let time = document.getElementById('appointmentTime').value;
        if (title && name && time) {
            let startDateTime = selectedDate + 'T' + time;
            let endDateTime = new Date(new Date(startDateTime).getTime() + 3600000).toISOString();

            if (selectedEvent) {
                selectedEvent.setProp('title', name);
                selectedEvent.setStart(startDateTime);
                selectedEvent.setEnd(endDateTime);
                selectedEvent.setExtendedProp('title', title);
            } else {
                calendar.addEvent({
                    title: name,
                    start: startDateTime,
                    end: endDateTime,
                    extendedProps: { title: title }
                });
            }
            closePopup();
        } else {
            alert("Veuillez remplir tous les champs.");
        }
    }

    function closePopup() {
        document.getElementById("popup").style.display = 'none';
    }
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
