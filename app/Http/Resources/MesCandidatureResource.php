<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MesCandidatureResource extends JsonResource
{
  
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "titre" => $this->titre,
            "description" => $this->description,
            "sous_categorie" => $this->sous_categorie ? $this->sous_categorie->name : "néant",
            "type" => $this->type ? $this->type->name : "néant",
            "active" => $this->active,
            "date" => $this->updated_at,
            "avatar" => $this->avatar,
            "user_id" => $this->user_id,
        ];
    }
}
