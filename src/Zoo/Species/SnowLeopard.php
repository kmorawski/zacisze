<?php

namespace App\Zoo\Species;

use App\Enum\FoodType;
use App\Enum\Species;

class SnowLeopard implements SpeciesInterface
{
    private const FEEDS = [FoodType::Meat];

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
        return Species::Leopard->name;
    }

    /**
     * @inheritDoc
     */
    public function feeds(): array
    {
        return self::FEEDS;
    }
}
