<?php

namespace App\Command;

use App\Enum\FoodType;
use App\Enum\Species;
use App\Zoo\ZooManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand('app:zoo:start')]
class ZooCommand extends Command
{
    private ZooManager $zooManager;

    public function __construct(ZooManager $zooManager)
    {
        parent::__construct();
        $this->zooManager = $zooManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->text('Welcome in virtual ZOO!');

        // Umieszczanie zwierząt w ZOO
        $lisek = $this->zooManager->animalToZoo(Species::Fox, 'Chytrusek');
        $tygrysek = $this->zooManager->animalToZoo(Species::Tiger, 'Harry');
        $slonik = $this->zooManager->animalToZoo(Species::Elephant, 'Bambi');
        $kroliczek = $this->zooManager->animalToZoo(Species::Rabbit, 'Chycuś');
        $nosorozec = $this->zooManager->animalToZoo(Species::Rhino, 'Twardziel');

        // Karmienie zwierząt (io->text wyświetla efekt karmienia)
        $io->text($lisek->feed(FoodType::Meat));
        $io->text($tygrysek->feed(FoodType::Meat));
        $io->text($slonik->feed(FoodType::Meat)); // slon nie je mięsa
        $io->text($slonik->feed(FoodType::Plant)); // ale slon zje roślinki
        $io->text($kroliczek->feed(FoodType::Plant));
        $io->text($nosorozec->feed(FoodType::Plant));

        // Pielęgnacja zwierząt (io->text wyświetla efekt pielęgnacji)
        $io->text($lisek->care());
        $io->text($tygrysek->care());
        $io->text($slonik->care());
        $io->text($kroliczek->care());
        $io->text($nosorozec->care());

        // Wypisanie gatunku i imienia zwierzątka
        echo $lisek . PHP_EOL;

        // Wyszukanie zwierzątka w ZOO (gdy nie znajdzie będzie wyrzucony wyjątek "Animal not found"
        $animal = $this->zooManager->findAnimal('Chytrusek');
        echo $animal . PHP_EOL;

        // Status zwierzątka (na wolności czy w ZOO?)
        $io->text($animal->describeFreedomStatus());

        return Command::SUCCESS;
    }
}
