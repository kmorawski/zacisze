<?php

namespace App\Zoo;

class Animal
{
    private string $name = '';

    private string $species;

    private bool $isFurry;

    private array $availableFood = [];

    public function __construct(string $species, array $food, bool $isFurry = false)
    {
        $this->species = $species;
        $this->isFurry = $isFurry;
        $this->availableFood = $food;
    }

    /**
     * To sting.
     *
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('%s %s', $this->species, $this->name);
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
        if ($this->isFurry) {
            echo 'Wyczesane';

            return;
        }

        echo 'Nie mam futerka';
    }

    /**
     * Feed.
     *
     * @param Food $food
     * @return void
     */
    public function feed(Food $food): void
    {
        if (in_array($food->getKind(), $this->availableFood)) {
            echo 'Miam, miam...';
            return;
        }

        echo 'Brrr! Nie jadam tego.';
    }
}