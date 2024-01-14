<?php

namespace App\Zoo;

use App\Enum\FoodType;

interface Food
{
    /**
     * Get type.
     *
     * @return FoodType
     */
    public function getKind(): FoodType;
}