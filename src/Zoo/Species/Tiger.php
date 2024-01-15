<?php

namespace App\Zoo\Species;

use App\Enum\FoodType;
use App\Enum\Species;

class Tiger implements SpeciesInterface
{
    private const FEEDS = [FoodType::Meat];

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
        return Species::Tiger->name;
    }

    /**
     * @inheritDoc
     */
    public function feeds(): array
    {
        return self::FEEDS;
    }
}
