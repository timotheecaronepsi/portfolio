<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $periode = null;

    #[ORM\Column(length: 100)]
    private ?string $image = null;

    /**
     * @var Collection<int, CompetenceProjet>
     */
    #[ORM\OneToMany(targetEntity: CompetenceProjet::class, mappedBy: 'Nprojets')]
    private Collection $competenceProjets;

    public function __construct()
    {
        $this->competenceProjets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(string $periode): static
    {
        $this->periode = $periode;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, CompetenceProjet>
     */
    public function getCompetenceProjets(): Collection
    {
        return $this->competenceProjets;
    }

    public function addCompetenceProjet(CompetenceProjet $competenceProjet): static
    {
        if (!$this->competenceProjets->contains($competenceProjet)) {
            $this->competenceProjets->add($competenceProjet);
            $competenceProjet->setNprojets($this);
        }

        return $this;
    }

    public function removeCompetenceProjet(CompetenceProjet $competenceProjet): static
    {
        if ($this->competenceProjets->removeElement($competenceProjet)) {
            // set the owning side to null (unless already changed)
            if ($competenceProjet->getNprojets() === $this) {
                $competenceProjet->setNprojets(null);
            }
        }

        return $this;
    }
}
