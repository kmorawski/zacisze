<?php

namespace App\Zoo\Species;

use App\Enum\FoodType;
use App\Enum\Species;

class Rhino implements SpeciesInterface
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
        return Species::Rhino->name;
    }

    /**
     * @inheritDoc
     */
    public function feeds(): array
    {
        return self::FEEDS;
    }
}
