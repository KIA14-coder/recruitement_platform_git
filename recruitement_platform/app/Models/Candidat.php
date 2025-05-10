<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
     

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cv',
        'etat_recherche',
        'portfolio'
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function jobsSaved() { return $this->hasMany(JobSaved::class); }
    public function jobsApplied() { return $this->hasMany(JobApplied::class); }
    public function candidatures() { return $this->hasMany(CandidatApplying::class); }
    public function meetings() { return $this->hasMany(Meeting::class); }
    
}
