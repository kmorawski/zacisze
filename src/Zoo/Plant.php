<?php

namespace App\Zoo;

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