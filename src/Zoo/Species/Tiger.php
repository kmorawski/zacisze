<?php

namespace App\Zoo\Species;

use App\Enum\FoodType;
use App\Enum\Species;

class Tiger implements SpeciesInterface
{
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
    public function feeds(): array
    {
        return [FoodType::Meat];
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
    public function validFeeds(FoodType $feed): bool
    {
        return in_array($feed, $this->feeds());
    }
}