<?php

namespace App\Zoo;

class Zoo
{
    private array $animals;

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
        $this->animals[] = $animal;
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
     * @param Food $food
     * @return void
     */
    public function feedAnimal(Animal $animal, Food $food): void
    {
        $animal->feed($food);
    }

}