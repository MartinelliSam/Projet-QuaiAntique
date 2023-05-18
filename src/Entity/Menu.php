<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: Formula::class)]
    private Collection $formula;

    public function __construct()
    {
        $this->formula = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getFormula(): Collection
    {
        return $this->formula;
    }

    public function addFormula(Formula $formula): self
    {
        if (!$this->formula->contains($formula)) {
            $this->formula->add($formula);
            $formula->setMenu($this);
        }

        return $this;
    }

    public function removeFormula(Formula $formula): self
    {
        if ($this->formula->removeElement($formula)) {
            // set the owning side to null (unless already changed)
            if ($formula->getMenu() === $this) {
                $formula->setMenu(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }
}
