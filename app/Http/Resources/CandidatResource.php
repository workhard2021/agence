<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CandidatResource extends JsonResource
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
            "id" => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "avatar" => $this->avatar,
            "date" => $this->updated_at,
            "description" => $this->description,
            "profession" => $this->sous_categorie ? $this->sous_categorie->name : "Aucune profession",
            "ville" => $this->ville ? $this->ville->name : "Aucune ville",
        ];
    }
}
