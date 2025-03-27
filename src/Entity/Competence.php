<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetenceRepository::class)]
class Competence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $skills = null;

    /**
     * @var Collection<int, CompetenceProjet>
     */
    #[ORM\OneToMany(targetEntity: CompetenceProjet::class, mappedBy: 'NCompetence')]
    private Collection $competenceProjets;

    /**
     * @var Collection<int, CompetenceStage>
     */
    #[ORM\OneToMany(targetEntity: CompetenceStage::class, mappedBy: 'Ncompetencesstages')]
    private Collection $competenceStages;

    public function __construct()
    {
        $this->competenceProjets = new ArrayCollection();
        $this->competenceStages = new ArrayCollection();
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

    public function getSkills(): array
    {
        return $this->skills ? explode(';', $this->skills) : [];
    }

    public function setSkills(array $skills): self
    {
        $this->skills = implode(';', $skills);
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
            $competenceProjet->setNCompetence($this);
        }

        return $this;
    }

    public function removeCompetenceProjet(CompetenceProjet $competenceProjet): static
    {
        if ($this->competenceProjets->removeElement($competenceProjet)) {
            // set the owning side to null (unless already changed)
            if ($competenceProjet->getNCompetence() === $this) {
                $competenceProjet->setNCompetence(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CompetenceStage>
     */
    public function getCompetenceStages(): Collection
    {
        return $this->competenceStages;
    }

    public function addCompetenceStage(CompetenceStage $competenceStage): static
    {
        if (!$this->competenceStages->contains($competenceStage)) {
            $this->competenceStages->add($competenceStage);
            $competenceStage->setNcompetencesstages($this);
        }

        return $this;
    }

    public function removeCompetenceStage(CompetenceStage $competenceStage): static
    {
        if ($this->competenceStages->removeElement($competenceStage)) {
            // set the owning side to null (unless already changed)
            if ($competenceStage->getNcompetencesstages() === $this) {
                $competenceStage->setNcompetencesstages(null);
            }
        }

        return $this;
    }

}
