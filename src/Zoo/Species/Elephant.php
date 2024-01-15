<?php

namespace App\Zoo\Species;

use App\Enum\FoodType;
use App\Enum\Species;

class Elephant implements SpeciesInterface
{
    private const FEEDS = [FoodType::Plant];

    /**
     * @inheritDoc
     */
    public function isFurry(): bool
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function speciesName(): string
    {
        return Species::Elephant->name;
    }

    /**
     * @inheritDoc
     */
    public function feeds(): array
    {
        return self::FEEDS;
    }
}
