<?php

namespace App\Zoo;

use App\Enum\FoodType;
use App\Zoo\Species\SpeciesInterface;

class Animal
{
    private string $name = 'No name';

    private SpeciesInterface $species;

    public function __construct(SpeciesInterface $species)
    {
        $this->species = $species;
    }

    /**
     * To sting.
     *
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('%s %s', $this->species->speciesName(), $this->name);
    }

    /**
     * Set name.
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Care.
     *
     * @return void
     */
    public function care(): void
    {
        if ($this->species->isFurry()) {
            echo 'Wyczesane';
        } else {
            echo 'Nie mam futerka';
        }
    }

    /**
     * Feed.
     *
     * @param FoodType $food
     * @return void
     */
    public function feed(FoodType $food): void
    {
        if ($this->species->validFeeds($food)) {
            echo 'Miam, miam...';
        } else {
            echo 'Brrr! Nie jadam tego.';
        }
    }
}