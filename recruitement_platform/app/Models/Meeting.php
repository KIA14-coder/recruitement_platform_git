<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Meeting extends Model
{
    use HasFactory;

    protected $fillable = ['candidat_id', 'employeur_id', 'job_id', 'date_heure', 'lien_meeting', 'statut'];

    public function candidat() { return $this->belongsTo(Candidat::class); }
    public function employeur() { return $this->belongsTo(Employeur::class); }
    public function job() { return $this->belongsTo(JobCreated::class); }
}
