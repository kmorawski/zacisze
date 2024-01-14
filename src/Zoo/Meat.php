<?php

namespace App\Zoo;

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