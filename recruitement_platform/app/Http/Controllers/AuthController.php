<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidat;
use App\Models\Employeur;


use App\Models\User;

class AuthController extends Controller
{


    public function register_candidat(Request $request){
        $fields = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'contact' => 'required'
            ]);

            $user = User::create($fields);

            Candidat::create([
                'user_id' => $user->id,
                // Les champs suivants sont optionnels et peuvent être ajoutés plus tard
                'cv' => null,
                'etat_recherche' => 'non spécifié',
                'portfolio' => null
            ]);

            $employeur = Employeur::where('user_id', $user->id)->first();

            session([
                'user_id' => $user->id,
                'user_role' => 'candidat',
                'last_activity' => now(),
                //'employeur_id' => $employeur->id
            ]);

            $user->role = 'candidat';
            $user->save();

            $token = $user->createToken($request->first_name);

            // Auth::login($user); // ← connexion directe en session
        return redirect()->route('dashboard.candidat')->with('success', 'Utilisateur créé avec succès !'); // ← redirection vers le dashboard

        // return [
        //     'user' => $user,
        //     'token' => $token->plainTextToken
        // ];
    }

    public function register_recruteur(Request $request){
        $fields = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'entreprise' => 'required',
            'contact' => 'required',
            
            ]);

            $user = User::create($fields);

            Employeur::create([
                'user_id' => $user->id,
                'nom_entreprise' => $fields['entreprise'],
                'description_entreprise' => null,
                'secteur' => null,
                'site_web_entreprise' => null
            ]);

            $user->role = 'employeur';
            $user->save();

            session([
                'user_id' => $user->id,
                'user_role' => 'employeur',
                'last_activity' => now()
            ]);

            
            
            $token = $user->createToken($request->first_name);

           // Auth::login($user); // ← connexion directe

        return redirect()->route('dashboard.recruteur');

        // return [
        //     'user' => $user,
        //     'token' => $token->plainTextToken
        // ];
    }


    public function login(Request $request){

            $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
            ]);
            $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)){
                return back()->with('error', 'Email ou mot de passe incorrect');

            };
            
            $token = $user->createToken($user->first_name);
            session([
                'user_id' => $user->id,
                'user_role' => $user->role,
                'last_activity' => now()
            ]);

            if ($user->role === 'employeur') {
                $employeur = Employeur::where('user_id', $user->id)->first();
                if ($employeur) {
                    session(['employeur_id' => $employeur->id]);
                }
            }
            
            return redirect()->route(
                $user->role === 'employeur' ? 'dashboard.recruteur' : 'dashboard.candidat')->with('message', 'Connexion réussie');
            
            

            // return [
            //     'user' => $user,
            //     'token' => $token->plainTextToken
            // ];
    }
    
    public function logout(Request $request){

        $role = session('user_role');
        session()->flush();

        return redirect()->route($role === 'employeur' ? 'connexion.recruteur' : 'connexion.candidat')
            ->with('message', 'Vous êtes déconnecté.');
    }
}
