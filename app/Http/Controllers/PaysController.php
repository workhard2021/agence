<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaysRequest;
use App\Http\Resources\PaysResource;
use App\Models\Pays;

class PaysController extends Controller
{
   
    public function index()
    {   
        $item=PaysResource::collection(Pays::all());
        return Response($item,200);
    }
    public function store(PaysRequest $request)
    {
         return Response(Pays::create($request->all()), 200);
    }

    public function show($id)
    {
         $item =new PaysResource(Pays::findOrfail($id));
         return Response($item,200);
    }

    public function update(PaysRequest $request, $id)
    {
         $item=Pays::findOrfail($id);
         $item->update($request->all());
         return Response($item,200);
    }

    public function destroy($id)
    {
        pays::findOrfail($id)->delete();
        return Response(['message'=>"effacé"],200);
    }
}
