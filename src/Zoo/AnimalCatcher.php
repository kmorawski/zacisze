<?php

namespace App\Zoo;

class AnimalCatcher
{
    public function createAnimal(string $animal): Animal
    {
        return match (strtolower($animal)) {
            'tygrys' => new Animal('Tygrys', [FoodType::Meat], true),
            'slon' => new Animal('Słoń', [FoodType::Plant]),
            'nosorozec' => new Animal('Nosorożec', [FoodType::Plant]),
            'lis' => new Animal('Lis', [FoodType::Meat], true),
            'irbis_snieżny' => new Animal('Irbis śnieżny', [FoodType::Meat], true),
            'krolik' => new Animal('Królik', [FoodType::Plant], true),
        };
    }
}