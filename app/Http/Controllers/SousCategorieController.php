<?php

namespace App\Http\Controllers;

use App\Http\Requests\SousCategorieRequest;
use App\Http\Resources\SousCategorieRessource;
use App\Models\SousCategorie;


class SousCategorieController extends Controller
{

    public function index()
    {
         $item= SousCategorieRessource::collection(SousCategorie::all());
         return Response($item,200);
    }

    function store(SousCategorieRequest $request)
    {
        return response(SousCategorie::create($request->all()),200);
    }

    public function show($id)
    {
         $item =new SousCategorieRessource(SousCategorie::findOrfail($id));
         return Response($item,200);
    }

    public function update(SousCategorieRequest $request, $id)
    {
         $item= SousCategorie::findOrfail($id);
         $item->update($request->all());
         return Response($item,200);
    }
    
    public function destroy($id)
    {
        SousCategorie::findOrfail($id)->delete();
        return response(['message'=>"effacé"], 200);
    }
}
