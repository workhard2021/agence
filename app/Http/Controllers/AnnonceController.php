<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnonceRequest;
use App\Http\Resources\AnnonceCollection;
use App\Http\Resources\AnnonceResource;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
          $item=new AnnonceCollection(Annonce::all());
          return Response($item,200);
    }

    public function store(AnnonceRequest $request)
    {
          $annonce= Annonce::create($request->all());
          return Response($annonce,200);
    }

    public function show($id)
    {   
        $item=new AnnonceResource(Annonce::findOrfail($id));
        return Response($item,200);
    }

    public function update(AnnonceRequest $request, $id)
    {  
           $annonce=Annonce::findOrfail($id);
           $annonce->update($request->all());
           return Response($annonce, 200);
    }

    public function destroy($id)
    {
        $annonce = Annonce::findOrfail($id);
        $annonce->delete();
        return Response(["message"=>"effacé"], 200);
    }
}
