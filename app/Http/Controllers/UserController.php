<?php

namespace App\Http\Controllers;

use App\Events\RegisterEvent;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Notifications\RegisterNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  
    public function index()
    {
         $item=new UserCollection(User::all());
         return response($item,200);
    }
    public function store(UserRequest $request)
    {     $field=$request->all();
          $field["password"]=Hash::make($request->input("password"));
          $item=User::create($field);
          RegisterEvent::dispatch($item);
          $item = new UserResource($item);
          return Response($item,200);
    }
    public function show($id)
    {  
        $item=new UserResource(User::findOrfail($id));
        return Response($item,200);
    }
    public function update(Request   $request, $id)
    {    
        $item=User::findOrfail($id);
        $item->update($request->all());
        return response($item, 200);
    }
    
    public function destroy($id)
    {
         User::findOrfail($id)->delete();
         return Response(['message'=>'effacé'],200);
    }
    public function login(Request $request){
          
        $user=User::where("email",$request->input("email"))->first();
        if(!$user) return Response(['message'=>'Mot de passe ou email est invalide'],404);
        if(!Hash::check($request->input("password"),$user->password))  return Response(['message' => 'Mot de passe ou email est invalide'], 404);
        $token = $user->createToken("userToken")->plainTextToken;
        $user['token'] = $token;
        return Response($user, 200);
      
    }
    public function logout(Request $request)
    {
         $request->user()->tokens()->delete();
         return Response(['message'=>"user logout "],200);
    }
}
