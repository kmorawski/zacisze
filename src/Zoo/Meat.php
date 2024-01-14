<?php

namespace App\Zoo;

use App\Enum\FoodType;

class Meat implements Food
{
    /**
     * @inheritDoc
     */
    public function getKind(): FoodType
    {
        return FoodType::Meat;
    }
}