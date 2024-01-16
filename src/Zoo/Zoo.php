<?php

namespace App\Zoo;

use RuntimeException;

class Zoo implements ZooInterface
{
    private array $animals;

    /**
     * @inheritDoc
     */
    public function acquireAnimal(Animal $animal, string $name): void
    {
        $animal->setName($name);

        $this->animals[] = $animal;
    }

    /**
     * @inheritDoc
     */
    public function findAnimalByName(string $animalName): Animal
    {
        /** @var Animal $animal */
        foreach ($this->animals as $animal) {
            if ($animal->getName() === $animalName) {
                return $animal;
            }
        }

        throw new RuntimeException('Animal not found.');
    }
}