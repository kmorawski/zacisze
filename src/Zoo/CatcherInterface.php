<?php

namespace App\Zoo;

use App\Enum\Species;

interface CatcherInterface
{
    /**
     * Create animal.
     *
     * @param Species $species
     *
     * @return Animal
     */
    public function catch(Species $species): Animal;
}