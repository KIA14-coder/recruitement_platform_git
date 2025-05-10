<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSaved extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidat_id', 
        'job_id',
        'date_sauvegarde'
    ];

    public function candidat() { return $this->belongsTo(Candidat::class); }
    public function job() { return $this->belongsTo(JobCreated::class); }
}