<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nom_entreprise',
        'description_entreprise',
        'secteur',
        'site_web_entreprise'
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function jobs() { return $this->hasMany(JobCreated::class); }
    public function meetings() { return $this->hasMany(Meeting::class); }
    
}
