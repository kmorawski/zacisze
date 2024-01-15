<?php

namespace App\Zoo\Species;

interface SpeciesInterface
{
    /**
     * Is furry.
     *
     * @return bool
     */
    public function isFurry(): bool;

    /**
     * Species name.
     *
     * @return string
     */
    public function speciesName(): string;

    /**
     * Feeds.
     *
     * @return array
     */
    public function feeds(): array;
}
