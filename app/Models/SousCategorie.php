<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Annonce;
use App\Models\Categorie;

class SousCategorie extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function annonces(){
        return $this->hasMany(Annonce::class);
    }
    public function categorie(){
         return $this->belongsto(Categorie::class);
    }
}
