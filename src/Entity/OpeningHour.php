<?php

namespace App\Entity;

use App\Repository\OpeningHourRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningHourRepository::class)]
class OpeningHour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $day = null;

    #[ORM\Column(nullable: true)]
    private ?int $noonOpeningHour = null;

    #[ORM\Column(nullable: true)]
    private ?int $noonClosingHour = null;

    #[ORM\Column(nullable: true)]
    private ?int $eveningOpeningHour = null;

    #[ORM\Column(nullable: true)]
    private ?int $eveningClosingHour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }
    public function getNoonOpeningHour(): ?int
    {
        return $this->noonOpeningHour;
    }

    public function setNoonOpeningHour(?int $noonOpeningHour): self
    {
        $this->noonOpeningHour = $noonOpeningHour;
        return $this;
    }

    public function getNoonClosingHour(): ?int
    {
        return $this->noonClosingHour;
    }
    public function setNoonClosingHour(?int $noonClosingHour): self
    {
        $this->noonClosingHour = $noonClosingHour;
        return $this;
    }

    public function getEveningOpeningHour(): ?int
    {
        return $this->eveningOpeningHour;
    }

    public function setEveningOpeningHour(?int $eveningOpeningHour): self
    {
        $this->eveningOpeningHour = $eveningOpeningHour;
        return $this;
    }
    public function getEveningClosingHour(): ?int
    {
        return $this->eveningClosingHour;
    }

    public function setEveningClosingHour(?int $eveningClosingHour): self
    {
        $this->eveningClosingHour = $eveningClosingHour;
        return $this;
    }

}


