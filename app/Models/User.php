<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Ville;
use App\Models\Souscategorie;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'ville_id', 
        'description',
        'sous_categorie_id',
        'avatar',
        'cv',      
    ];
  

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        "created_at" => "datetime:y-m-d h:i:s",
        "updated_at" => "datetime:y-m-d h:i:s"
    ];
    
    public function roles(){
          return  $this->belongsToMany(Role::class);
    }
    public function mes_candidatures(){
        return $this->belongsToMany(Annonce::class);
    }

    public function mes_annonces()
    {
        return $this->hasMany(Annonce::class);
    }
    public function ville(){
          return  $this->belongsTo(Ville::class);
    }
    public function sous_categorie()
    {
        return  $this->belongsTo(SousCategorie::class);
    }
}
