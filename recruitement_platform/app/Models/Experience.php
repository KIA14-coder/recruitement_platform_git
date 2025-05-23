<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Experience extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'titre_poste', 'entreprise', 'lieu', 'date_debut', 'date_fin', 'description'];

    public function user() { return $this->belongsTo(User::class); }
}
