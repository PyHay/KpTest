<?php

namespace App\Repository;

use App\Entity\Person;
use DateTimeImmutable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Person>
 */
class PersonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Person::class);
    }

    public function getBornedAtField(): array
    {
        $persons = $dates = $this->createQueryBuilder("p")
            ->getQuery()
            ->getResult();

        $years = [];

        foreach ($persons as $person) {
            $years[] = $person->getBornedAt()->format("Y");
        }

        return $years;
    }

    public function getDiedAtField(): array
    {
        $persons = $dates = $this->createQueryBuilder("p")
            ->getQuery()
            ->getResult();

        $years = [];

        foreach ($persons as $person) {
            $years[] = $person->getDiedAt()->format("Y");
        }

        return $years;
    }
}
