<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatApplying extends Model
{
    use HasFactory;

    // Les champs que l'on peut remplir
    protected $fillable = [
        'job_id', 
        'candidat_id', 
        'statut', 
        'cv_path', 
        'lm_path', 
        'message'
    ];

    // Relation avec le modèle JobCreated
    public function job() 
    { 
        return $this->belongsTo(JobCreated::class); 
    }

    // Relation avec le modèle Candidat
    public function candidat() 
    { 
        return $this->belongsTo(Candidat::class); 
    }
}
