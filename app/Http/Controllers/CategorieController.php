<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieRequest;
use App\Http\Resources\CategorieResource;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
         $item=CategorieResource::collection(Categorie::all());
         return Response($item,200);
    }
    
    public function store(CategorieRequest $request)
    {
        $annonce = Categorie::create($request->all());
        return Response($annonce, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item =new CategorieResource(Categorie::findOrfail($id));
        return response($item,200);
    }

    public function update(CategorieRequest $request, $id)
    {
        $item = Categorie::findOrfail($id);
        $item->update($request->all());
        return response($item, 200);
    }

    public function destroy($id)
    {
        $item = Categorie::findOrfail($id);
        $item->delete();
        return response(["message"=>"effacé"], 200);
    }
}
