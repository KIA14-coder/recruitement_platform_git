<?php

namespace App\Http\Controllers;
use App\Models\Candidat;
use App\Models\Employeur;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function dashboardRecruteur()
    {
        if (!session()->has('employeur_id')) {
            return redirect()->route('connexion.recruteur')->with('error', 'Veuillez vous reconnecter.');
        }

        $employeur = Employeur::find(session('employeur_id'));
        return view('tableaudebord_recruteur', compact('employeur'));
    }   
    
    }
