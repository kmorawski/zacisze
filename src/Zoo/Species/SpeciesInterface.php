<?php

namespace App\Zoo\Species;

use App\Enum\FoodType;

interface SpeciesInterface
{
    /**
     * Is furry.
     *
     * @return bool
     */
    public function isFurry(): bool;

    /**
     * Feeds.
     *
     * @return array[FoodTypes]
     */
    public function feeds(): array;

    /**
     * Species name.
     *
     * @return string
     */
    public function speciesName(): string;

    /**
     * Valid feeds.
     *
     * @param FoodType $feed
     * @return bool
     */
    public function validFeeds(FoodType $feed): bool;
}