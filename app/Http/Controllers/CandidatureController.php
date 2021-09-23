<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnnonceCollection;
use App\Models\Annonce;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
   
   public function index()
   {
        $item=new AnnonceCollection(Annonce::all());
        return response($item, 200);  
   }
   public function store(Request $request)
   {   
        $field=$request->validate([
             "annonce_id"=>"required|numeric",
             "user_id"=>"required|numeric"
        ]);
        $item = Annonce::findOrfail($field["annonce_id"]);
        $exist = $item->candidats()->wherePivot("user_id", $field["user_id"])->first();
        if($exist) return Response(['message' => "Vous avez déja postulé pour cet annonce"], 404);
        $item->candidats()->attach([$field["user_id"]]);
        return response(["message"=>"postulé"], 200);
    }
    public function update(Request $request)
    {
        $field=$request->validate([
             "annonce_id"=>"required|numeric",
             "user_id"=>"required|numeric"
        ]);
        $item = Annonce::findOrfail($field['annonce_id']);
        $item->candidats()->detach([$field["user_id"]]);
        return response(["message"=>"candidature éffacée"],200);
    }
}
