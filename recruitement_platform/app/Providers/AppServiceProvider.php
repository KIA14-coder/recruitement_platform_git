<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Employeur;
use App\Models\Candidat;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (session()->has('employeur_id')) {
                $employeur = Employeur::find(session('employeur_id'));
                $view->with('employeur', $employeur);
            }
    
            if (session()->has('candidat_id')) {
                $candidat = Candidat::find(session('candidat_id'));
                $view->with('candidat', $candidat);
            }
        });
    }
}
