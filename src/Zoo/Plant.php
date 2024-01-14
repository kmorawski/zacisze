<?php

namespace App\Zoo;

use App\Enum\FoodType;

class Plant implements Food
{
    /**
     * @inheritDoc
     */
    public function getKind(): FoodType
    {
        return FoodType::Plant;
    }
}