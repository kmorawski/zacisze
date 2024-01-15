<?php

namespace App\Zoo;

use App\Enum\FoodType;
use App\Enum\FreedomStatus;
use App\Zoo\Species\SpeciesInterface;

class Animal
{
    private string $name;

    private SpeciesInterface $species;

    private FreedomStatus $freedomStatus;

    public function __construct(SpeciesInterface $species)
    {
        $this->species = $species;
        $this->name = '';
        $this->freedomStatus = FreedomStatus::Free;
    }

    /**
     * To sting.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->describe();
    }

    /**
     * Care.
     *
     * @return string
     */
    public function care(): string
    {
        if ($this->species->isFurry()) {
            return sprintf('%s został wyczesany.', $this->describe());
        } else {
            return sprintf('%s nie wymaga czesania.', $this->describe());
        }
    }

    /**
     * Feed.
     *
     * @param FoodType $food
     *
     * @return string
     */
    public function feed(FoodType $food): string
    {
        if (in_array($food, $this->species->feeds())) {
            return sprintf('%s zjadł %s.', $this->describe(), $food->name);
        } else {
            return sprintf('%s nie jada %s.', $this->describe(), $food->name);
        }
    }

    /**
     * To zoo.
     *
     * @return void
     */
    public function toZoo(): void
    {
        $this->freedomStatus = FreedomStatus::InZoo;
    }

    /**
     * Describe freedom status.
     *
     * @return string
     */
    public function describeFreedomStatus(): string
    {
        return sprintf(
            '%s%s.',
            $this->describe(),
            $this->isInZoo() ? ' umieszczony w ZOO' : ' żyje na wolności'
        );
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Describe.
     *
     * @return string
     */
    private function describe(): string
    {
        return sprintf(
            '%s%s%s',
            $this->species->speciesName(),
            $this->name === '' ? '' : ' ', $this->name
        );
    }

    /**
     * Is in zoo.
     *
     * @return bool
     */
    private function isInZoo(): bool
    {
        return $this->freedomStatus->name === FreedomStatus::InZoo->name;
    }
}
