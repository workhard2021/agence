<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SousCategorie;
use App\Models\User;
use App\Models\Type;

class Annonce extends Model
{
    use HasFactory;
    protected $fillable=[
          'description',
          'titre',
          'user_id',
          'sous_categorie_id',
          'type_id',
          'avatar',
    ];
    public function candidats(){
        return $this->belongsToMany(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function sousCategorie(){
          return  $this->belongsto(SousCategorie::class);
    }
    public function type()
    {
        return $this->belongsto(Type::class);
    }
}
