<?php

namespace App\Zoo;

use App\Enum\Species;

class ZooManager
{
    /**
     * Zoo.
     *
     * @var ZooInterface
     */
    private ZooInterface $zoo;

    /**
     * Animal catcher.
     *
     * @var CatcherInterface
     */
    private CatcherInterface $animalCather;

    /**
     * Constructor.
     *
     * @param ZooInterface $zoo
     * @param CatcherInterface $animalCather
     */
    public function __construct(ZooInterface $zoo, CatcherInterface $animalCather)
    {
        $this->zoo = $zoo;
        $this->animalCather = $animalCather;
    }

    /**
     * Animal to zoo.
     *
     * @param Species $species
     * @param string $animalName
     *
     * @return Animal
     */
    public function animalToZoo(Species $species, string $animalName): Animal
    {
        $animal = $this->catchAnimal($species);
        $this->zoo->acquireAnimal($animal, $animalName);
        $animal->toZoo();

        return $animal;
    }

    /**
     * Find animal.
     *
     * @param string $animalName
     *
     * @return Animal
     */
    public function findAnimal(string $animalName): Animal
    {
        return $this->zoo->findAnimalByName($animalName);
    }

    /**
     * Show animals.
     *
     * @return void
     */
    public function showAnimals(): void
    {
        $this->zoo->animalList();
    }

    /**
     * Catch animal.
     *
     * @param Species $species
     *
     * @return Animal
     */
    private function catchAnimal(Species $species): Animal
    {
        return $this->animalCather->catch($species);
    }
}