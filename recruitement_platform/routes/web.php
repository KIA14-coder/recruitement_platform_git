<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;
use App\Http\Middleware\SessionTimeout;
use App\Http\Controllers\FirebaseAuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

//  Accueil
Route::get('/home', [HomeController::class, 'showHome'])->name('home');


// Page choix inscription et Connexion (candidat ou recruteur)
Route::get('/inscription/choix', function () {
    return view('candidatourecruteur');
})->name('inscription.choix');


Route::get('/connexion/choix', function () {
    return view('connection');
})->name('connexion.choix');

// 🔐 Connexion (2 vues, même fonction)
Route::get('/connexion/candidat', function () {
    return view('connexioncandidat');
})->name('connexion.candidat');

Route::get('/connexion/recruteur', function () {
    return view('connexionrecruteur');
})->name('connexion.recruteur');

Route::post('/connexion', [FirebaseAuthController::class, 'login'])->name('auth.login');

// 📝 Inscriptions
Route::get('/inscription/candidat', function () {
    return view('creer_compte_utilisateur');
})->name('inscription.candidat');

Route::post('/inscription/candidat2', [FirebaseAuthController::class, 'registerCandidat'])->name('register.candidat');

Route::get('/inscription/recruteur', function () {
    return view('creer_compte_recruteur');
})->name('inscription.recruteur');

Route::post('/inscription/recruteur2', [FirebaseAuthController::class, 'registerRecruteur'])->name('register.recruteur');

// 🚪 Déconnexion
Route::post('/logout', [FirebaseAuthController::class, 'logout'])->name('logout');


//Dashboard

//Route::middleware([SessionTimeout::class])->group(function () {
    Route::get('/dashboard/candidat', function () {
        return view('tableaudebord_candidat');
    })->name('dashboard.candidat');

    // Route::get('/dashboard/recruteur', [DashboardController::class, 'dashboardRecruteur'])->name('dashboard.recruteur');
    Route::get('/dashboard/recruteur', function () {
        return view('tableaudebord_recruteur');
    })->name('dashboard.recruteur');
//});


//Offres

// Affiche toutes les offres
Route::get('/offres', [JobController::class, 'index'])->name('offres.index');

// Affiche une offre spécifique
Route::get('/offres/{id}', [JobController::class, 'show'])->name('offres.show');

// Crée une nouvelle offre (POST)
Route::post('/offres', [JobController::class, 'store'])->name('offres.store');

// Met à jour une offre (PATCH ou PUT)
Route::match(['put', 'patch'], '/offres/{id}', [JobController::class, 'update'])->name('offres.update');

// Supprime une offre
Route::delete('/offres/{id}', [JobController::class, 'destroy'])->name('offres.destroy');



Route::get('/ajouter/offres', function () {
    return view('emploi');
})->name('add.offres');

//Route::get('afficher/offres/', [JobController::class, 'show'])->name('offres.show');

Route::get('/voir/offres', [JobController::class, 'index'])->name('voir.offres');




//chatbot 
Route::post('/chatbot', [ChatController::class, 'message']);


//candidat

// 👤 Profil du candidat
Route::get('/dashboard/candidat/profil', function () {
    return view('profil_candidat');
})->name('dashboard.candidat.profil');

// 💾 Offres sauvegardées
Route::get('/dashboard/candidat/offres-sauvegardees', function () {
    return view('offres_sauvegarder');
})->name('dashboard.candidat.offres_sauvegardees');

//modifier profil
Route::get('/dashboard/candidat/modifier-profil', function () {
    return view('modifier_profil');
})->name('dashboard.candidat.modifier_profil');


//recruteur

// 👤 Profil du recruteur
Route::get('/dashboard/recruteur/profil', function () {
    return view('profil');
})->name('dashboard.recruteur.profil');

// 📋 Suivi des candidats
Route::get('/dashboard/recruteur/suivi-candidats', function () {
    return view('suivi_candidat');
})->name('dashboard.recruteur.suivi_candidats');

// 🗓️ Page des entretiens
Route::get('/dashboard/recruteur/entretiens', function () {
    return view('entretien');
})->name('dashboard.recruteur.entretiens');

//modifier profil
Route::get('/dashboard/recruteur/modifier-profil', function () {
    return view('modifier_profil_recruteur');
})->name('dashboard.recruteur.modifier_profil');

