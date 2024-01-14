<?php

namespace App\Zoo;

use App\Enum\FoodType;
use App\Enum\Species;
use App\Zoo\Species\Tiger;

class AnimalCatcher
{
    public function createAnimal(string $animal): Animal
    {
        return match (strtolower($animal)) {
            'tygrys' => new Animal(new Tiger()),
            'slon' => new Animal(Species::Elephant, [FoodType::Plant]),
            'nosorozec' => new Animal(Species::Rhino, [FoodType::Plant]),
            'lis' => new Animal(Species::Fox, [FoodType::Meat], true),
            'irbis_snieżny' => new Animal(Species::Leopard, [FoodType::Meat], true),
            'krolik' => new Animal(Species::Rabbit, [FoodType::Plant], true),
        };
    }
}