<?php

namespace App\Zoo;

interface ZooInterface
{
    /**
     * Acquire animal.
     *
     * @param Animal $animal
     * @param string $name
     *
     * @return void
     */
    public function acquireAnimal(Animal $animal, string $name): void;

    /**
     * Find animal by name.
     *
     * @param string $animalName
     *
     * @return Animal
     */
    public function findAnimalByName(string $animalName): Animal;
}
