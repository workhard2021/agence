<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SousCategorie;

class Categorie extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function sousCategories(){
        return  $this->hasMany(SousCategorie::class);
    }
}
