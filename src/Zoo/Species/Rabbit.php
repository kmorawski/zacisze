<?php

namespace App\Zoo\Species;

use App\Enum\FoodType;
use App\Enum\Species;

class Rabbit implements SpeciesInterface
{
    private const FEEDS = [FoodType::Plant];

    /**
     * @inheritDoc
     */
    public function isFurry(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function speciesName(): string
    {
        return Species::Rabbit->name;
    }

    /**
     * @inheritDoc
     */
    public function feeds(): array
    {
        return self::FEEDS;
    }
}
