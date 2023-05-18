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

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $noonOpeningHour = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $noonClosingHour = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $eveningOpeningHour = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $eveningClosingHour = null;

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
    public function getNoonOpeningHour(): ?\DateTimeInterface
    {
        return $this->noonOpeningHour;
    }

    public function setNoonOpeningHour(?\DateTimeInterface $noonOpeningHour): self
    {
        $this->noonOpeningHour = $noonOpeningHour;
        return $this;
    }

    public function getNoonClosingHour(): ?\DateTimeInterface
    {
        return $this->noonClosingHour;
    }
    public function setNoonClosingHour(?\DateTimeInterface $noonClosingHour): self
    {
        $this->noonClosingHour = $noonClosingHour;
        return $this;
    }

    public function getEveningOpeningHour(): ?\DateTimeInterface
    {
        return $this->eveningOpeningHour;
    }

    public function setEveningOpeningHour(?\DateTimeInterface $eveningOpeningHour): self
    {
        $this->eveningOpeningHour = $eveningOpeningHour;
        return $this;
    }
    public function getEveningClosingHour(): ?\DateTimeInterface
    {
        return $this->eveningClosingHour;
    }

    public function setEveningClosingHour(?\DateTimeInterface $eveningClosingHour): self
    {
        $this->eveningClosingHour = $eveningClosingHour;
        return $this;
    }

}


