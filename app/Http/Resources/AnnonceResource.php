<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnnonceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
             "titre"=> $this->titre,
             "description" =>$this->description,
             "sous_categorie" => $this->sous_categorie ? $this->sous_categorie->name : "néant",
             "type" => $this->type ? $this->type->name : "néant",
             "active" => $this->active,
             "date"=>$this->updated_at,
             "avatar"=> $this->avatar,
             "user_id"=>$this->user_id,
             "auteur"=> new AuteurResource($this->user),
             "candidats"=> CandidatResource::collection($this->candidats)
        ];
    }
}
