<?php

namespace App\Zoo;

interface Food
{
    /**
     * Get type.
     *
     * @return FoodType
     */
    public function getKind(): FoodType;
}