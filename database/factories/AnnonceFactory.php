<?php

namespace Database\Factories;

use App\Models\Annonce;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnonceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Annonce::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "titre"=>$this->faker->paragraph(1),
            "description"=>$this->faker->realText(),
            "sous_categorie_id"=>random_int(1,20),
            "type_id" => random_int(1,5),
            "user_id"=>random_int(1,10),
            "avatar"=>$this->faker->imageUrl(),
            "active"=>random_int(0,1)
        ];
    }
}
