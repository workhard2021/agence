<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
   
    public function index()
    { 
        $item=RoleResource::collection(Role::all());
        return response($item);
    }

    public function store(Request $request)
    {      
        $field=$request->validate([
            "name"=>"required|string"
        ]);
        $item=Role::create($field);
        $item=new RoleResource($item);
        return response(["message"=>"enregistré","data"=> $item],200);
    }
    public function show($id)
    {
        $item=new RoleResource(Role::findOrfail($id));
        return response($item, 200);
    }

    public function update(Request $request, $id)
    {
        $field = $request->validate([
            "name" => "required|string"
        ]);
        $item=Role::findOrfail($id);
        $item->update($field);
        $item = new RoleResource($item);
        return response($item, 200);
    }

    public function destroy($id)
    {
       $item=Role::findOrfail($id);
       $item->delete();
       return response(["message"=>"effacé"], 200);
    }
    public function attachRole(Request $request){
         $field=$request->validate([
              "user_id"=>"required|numeric",
              "roles"=>"required|array"
         ]);
        $item=User::findOrfail($field["user_id"]);
        $item->roles()->sync($field["roles"]);
        return response(["message"=>"attaché"],200);
    }
}
