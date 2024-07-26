<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $died_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $borned_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiedAt(): ?\DateTimeImmutable
    {
        return $this->died_at;
    }

    public function setDiedAt(\DateTimeImmutable $died_at): static
    {
        $this->died_at = $died_at;

        return $this;
    }

    public function getBornedAt(): ?\DateTimeImmutable
    {
        return $this->borned_at;
    }

    public function setBornedAt(\DateTimeImmutable $borned_at): static
    {
        $this->borned_at = $borned_at;

        return $this;
    }
}
