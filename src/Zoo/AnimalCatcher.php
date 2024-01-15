<?php

namespace App\Zoo;

use App\Enum\Species;
use App\Zoo\Species\Elephant;
use App\Zoo\Species\Fox;
use App\Zoo\Species\Rabbit;
use App\Zoo\Species\Rhino;
use App\Zoo\Species\SnowLeopard;
use App\Zoo\Species\Tiger;

class AnimalCatcher implements CatcherInterface
{
    /**
     * Create animal.
     *
     * @param Species $species
     *
     * @return Animal
     */
    public function catch(Species $species): Animal
    {
        return match ($species->name) {
            Species::Tiger->name => new Animal(new Tiger()),
            Species::Elephant->name => new Animal(new Elephant()),
            Species::Rhino->name => new Animal(new Rhino()),
            Species::Fox->name => new Animal(new Fox()),
            Species::Leopard->name => new Animal(new SnowLeopard()),
            Species::Rabbit->name => new Animal(new Rabbit()),
        };
    }
}
