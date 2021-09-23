<?php

namespace App\Http\Controllers;

use App\Http\Requests\VilleRequest;
use App\Http\Resources\VilleResource;
use App\Models\Ville;

class VilleController extends Controller
{
    public function index()
    {
        $item=VilleResource::collection(Ville::all());
        return Response($item,200);
    }

    public function store(VilleRequest $request)
    {  
         return response(Ville::create($request->all(),200));
         
    }

    public function show($id)
    {
         $item = new VilleResource(Ville::findOrfail($id));
         return Response($item,200);
    }

   
    public function update(VilleRequest $request, $id)
    {
           $item=Ville::findOrfail($id);
           $item->update($request->all());
           return response($item, 200);    
    }
    
    public function destroy($id)
    {
         Ville::findOrfail($id)->delete();
         return response(["message"=>"effacé"],200);
    }
}
