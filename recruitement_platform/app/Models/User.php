<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'firebase_uid',
        'first_name',
        'last_name',
        'email',
        'photo_profil',
        'bio',
        'linkedin',
        'role',
        'contact'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function candidat() { return $this->hasOne(Candidat::class); }
    public function employeur() { return $this->hasOne(Employeur::class); }

    public function competences() { return $this->hasMany(Competence::class); }
    public function experiences() { return $this->hasMany(Experience::class); }
    public function formations() { return $this->hasMany(Formation::class); }

    public function messagesEnvoyes() { return $this->hasMany(Message::class, 'expediteur_id'); }
    public function messagesRecus() { return $this->hasMany(Message::class, 'destinataire_id'); }

    public function notifications() { return $this->hasMany(Notification::class); }
}
