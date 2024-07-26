<?php

namespace App\Command;

use App\Repository\PersonRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[
    AsCommand(
        name: "person:best-year",
        description: "calculate a year where we have more live people"
    )
]
class PersonBestYearCommand extends Command
{
    public function __construct(private PersonRepository $personRepository)
    {
        parent::__construct();
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $io = new SymfonyStyle($input, $output);

        $borned = $this->personRepository->getBornedAtField();
        $died = $this->personRepository->getDiedAtField();

        $year = $this->findMaxInterval($borned, $died, count($borned));

        $io->success("Year: " . $year);

        return Command::SUCCESS;
    }

    private function findMaxInterval(array $born, array $died, int $n): int
    {
        sort($born);
        sort($died);

        $alive = 1;
        $max_alive = 1;
        $year = $born[0];
        $i = 1;
        $j = 0;

        while ($i < $n and $j < $n) {
            if ($born[$i] <= $died[$j]) {
                $alive++;

                if ($alive > $max_alive) {
                    $max_alive = $alive;
                    $year = $born[$i];
                }

                $i++;
            } else {
                $alive--;
                $j++;
            }
        }

        return $year;
    }
}
