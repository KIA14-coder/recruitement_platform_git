<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\Auth\EmailExists;
use App\Models\User;
use App\Models\Candidat;
use App\Models\Employeur;

class FirebaseAuthController extends Controller
{
    protected $firebaseAuth;
    protected $database;

    public function __construct(FirebaseAuth $firebaseAuth)
    {
        $factory = (new Factory)
            ->withServiceAccount(config('storage/firebase/firebase.json'))
            ->withDatabaseUri(config('https://auth-53db4-default-rtdb.firebaseio.com/'));

        $this->firebaseAuth = $factory->createAuth();
        $this->database = $factory->createDatabase();

    }

    public function registerCandidat(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'password'   => 'required|confirmed|min:8',
            'contact'    => 'required',
        ]);

        try {
            // Création dans Firebase Auth
            // $firebaseUser = $this->firebaseAuth->createUserWithEmailAndPassword(
            //     $request->email,
            //     $request->password
            // );

            $firebaseUser = $this->firebaseAuth->createUser([
                'email' => $request->email,
                'password' => $request->password,
                'displayName' => $request->first_name . ' ' . $request->last_name,
            ]);

            // Enregistrement dans la table `users`
            $user = User::create([
                'firebase_uid' => $firebaseUser->uid,
                'first_name'   => $request->first_name,
                'last_name'    => $request->last_name,
                'email'        => $request->email,
                'contact'      => $request->contact,
                'role'         => 'candidat',
            ]);

            // Ajout du profil Candidat
            Candidat::create([
                'user_id'        => $user->id,
                'cv'             => null,
                'etat_recherche' => 'non spécifié',
                'portfolio'      => null
            ]);

            $this->database->getReference('users/candidats/' . $firebaseUser->uid)
                ->set([
                    'first_name' => $request['first_name'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                    'contact' => $request['contact'],
                ]);


            // Authentification côté Laravel (via Session)
            session([
                'user_id' => $user->id,
                'user_role' => 'candidat',
                'last_activity' => now(),
            ]);

            return redirect()->route('dashboard.candidat')->with('success', 'Inscription réussie !');

        } catch (EmailExists $e) {
            return back()->with('error', 'Cet email est déjà utilisé sur Firebase.');
        }catch (\Throwable $e) {
            return back()->with('error', 'Erreur lors de l’inscription : ' . $e->getMessage());
        }
    }

    public function registerRecruteur(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'password'   => 'required|confirmed|min:8',
            'entreprise' => 'required',
            'contact'    => 'required',
        ]);

        try {
            // Création dans Firebase
            $firebaseUser = $this->firebaseAuth->createUser([
                'email' => $request->email,
                'password' => $request->password,
                'displayName' => $request->first_name . ' ' . $request->last_name,
            ]);

            // Enregistrement dans la table `users`
            $user = User::create([
                'firebase_uid' => $firebaseUser->uid,
                'first_name'   => $request->first_name,
                'last_name'    => $request->last_name,
                'email'        => $request->email,
                'contact'      => $request->contact,
                'role'         => 'employeur',
            ]);

            Employeur::create([
                'user_id'              => $user->id,
                'nom_entreprise'       => $request->entreprise,
                'description_entreprise' => null,
                'secteur'              => null,
                'site_web_entreprise'  => null,
            ]);

            $this->database->getReference('users/recruteurs/' . $firebaseUser->uid)
                ->set([
                    'first_name' => $request['first_name'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                    'entreprise' => $request['entreprise'],
                    'contact' => $request['contact'],
                ]);


                session([
                    'user_id' => $user->id,
                    'user_role' => 'employeur',
                    'last_activity' => now(),
                ]);

            return redirect()->route('dashboard.recruteur')->with('success', 'Recruteur inscrit avec succès !');

        } catch (EmailExists $e) {
            return back()->with('error', 'Cet email est déjà utilisé sur Firebase.');
        }catch (\Throwable $e) {
            return back()->with('error', 'Erreur lors de l’inscription : ' . $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'id_token' => 'required|string',
        ]);

        try {
            // 🔐 Vérifier le token Firebase
            $verifiedIdToken = $this->firebaseAuth->verifyIdToken($request->input('id_token'));
            $firebaseUid = $verifiedIdToken->claims()->get('sub');

            // 🔍 Chercher l'utilisateur correspondant à ce UID
            $user = User::where('firebase_uid', $firebaseUid)->first();

            if (!$user) {
                return back()->with('error', 'Aucun utilisateur lié à ce compte Firebase.');
            }

            // 🏷 Détection du rôle (employeur ou candidat)
            $role = $user->role;

            // Création session Laravel (comme avant)
            session([
                'user_id' => $user->id,
                'user_role' => $role,
                'last_activity' => now()
            ]);

            // Si employeur, ajouter employeur_id
            if ($role === 'employeur') {
                $employeur = Employeur::where('user_id', $user->id)->first();
                if ($employeur) {
                    session(['employeur_id' => $employeur->id]);
                }
            }

            return redirect()->route(
                $role === 'employeur' ? 'dashboard.recruteur' : 'dashboard.candidat'
            )->with('message', 'Connexion réussie.');

        } catch (\Throwable $e) {
            // 🧨 Si le token est invalide ou expiré
            return back()->with('error', 'Échec de l’authentification Firebase. Veuillez réessayer.');
        }
    }


    public function logout()
    {
        $role = Session::get('user_role');
        Session::flush();

        return redirect()->route($role === 'employeur' ? 'connexion.recruteur' : 'connexion.candidat')
            ->with('message', 'Vous êtes déconnecté.');
    }
}
