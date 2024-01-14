<?php

namespace App\Zoo;

use App\Enum\FoodType;

class Zoo
{
    /**
     * Insert animal.
     *
     * @param Animal $animal
     * @param string $name
     * @return void
     */
    public function insertAnimal(Animal $animal, string $name): void
    {
        $animal->setName($name);
    }

    /**
     * Care animal.
     *
     * @param Animal $animal
     * @return void
     */
    public function careAnimal(Animal $animal): void
    {
        $animal->care();
    }

    /**
     * Feed animal.
     *
     * @param Animal $animal
     * @param FoodType $food
     * @return void
     */
    public function feedAnimal(Animal $animal, FoodType $food): void
    {
        $animal->feed($food);
    }

}