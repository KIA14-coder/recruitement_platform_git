<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class JobCreated extends Model
{
    use HasFactory;

    protected $fillable = [
        'employeur_id',
        'url',
        'entreprise',
        'titre',
        'description',
        'type_contrat',
        'teletravail',
        'salaire',
        'lieu',
        'date_publication',
        'date_expiration',
        'statut'
    ];

    protected $casts = [
        'date_publication' => 'datetime',
        'date_expiration' => 'datetime',
    ];

    public function employeur() { return $this->belongsTo(Employeur::class); }
    public function jobsSaved() { return $this->hasMany(JobSaved::class); }
    public function jobsApplied() { return $this->hasMany(JobApplied::class); }
    public function candidatures() { return $this->hasMany(CandidatApplying::class); }
    public function meetings() { return $this->hasMany(Meeting::class); }
}