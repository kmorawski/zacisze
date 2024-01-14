<?php

namespace App\Command;

use App\Zoo\AnimalCatcher;
use App\Zoo\Meat;
use App\Zoo\Plant;
use App\Zoo\Zoo;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand('app:zoo:start')]
class ZooCommand extends Command
{
    private AnimalCatcher $animalCatcher;

    private Zoo $zoo;

    public function __construct(AnimalCatcher $animalCatcher, Zoo $zoo)
    {
        parent::__construct();
        $this->animalCatcher = $animalCatcher;
        $this->zoo = $zoo;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->text('Welcome in virtual ZOO!');

        $lisek = $this->animalCatcher->createAnimal('lis');
        $tygrysek = $this->animalCatcher->createAnimal('tygrys');
        $slonik = $this->animalCatcher->createAnimal('slon');

        $this->zoo->insertAnimal($lisek, 'Chytrusek');
        $this->zoo->insertAnimal($tygrysek, 'Harry');

        $io->text($lisek);
        $this->zoo->feedAnimal($lisek, new Plant());
        $this->zoo->careAnimal($lisek);

        $io->text($tygrysek);
        $this->zoo->feedAnimal($tygrysek, new Meat());
        $this->zoo->careAnimal($tygrysek);

        $this->zoo->careAnimal($slonik);

        return Command::SUCCESS;
    }
}
