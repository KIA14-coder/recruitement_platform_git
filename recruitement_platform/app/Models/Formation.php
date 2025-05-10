<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Formation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'diplome', 'ecole', 'date_debut', 'date_fin'];

    public function user() { return $this->belongsTo(User::class); }
}
