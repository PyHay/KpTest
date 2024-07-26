<?php

namespace App\DataFixtures;

use App\Entity\Person;
use DateTime;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PersonFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $person = new Person();

            $date = new DateTime("2000-01-01 11:45 Europe/London");

            $person
                ->setBornedAt(DateTimeImmutable::createFromMutable($date))
                ->setDiedAt(
                    DateTimeImmutable::createFromMutable(
                        $date->modify("+20 year")
                    )
                );

            $manager->persist($person);
        }

        $person = new Person();

        $dateBornNew = new DateTime("2019-01-01 11:45 Europe/London");

        $person
            ->setBornedAt(DateTimeImmutable::createFromMutable($dateBornNew))
            ->setDiedAt(
                DateTimeImmutable::createFromMutable($date->modify("+20 year"))
            );

        $manager->persist($person);

        $manager->flush();
    }
}
