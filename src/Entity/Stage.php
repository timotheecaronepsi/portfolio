<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StageRepository::class)]
class Stage
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

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $attestation = null;

    /**
     * @var Collection<int, CompetenceStage>
     */
    #[ORM\OneToMany(targetEntity: CompetenceStage::class, mappedBy: 'Nstages')]
    private Collection $competenceStages;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rapport = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img_rapport = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $powerpoint = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img_powerpoint = null;

    public function __construct()
    {
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

    public function getAttestation(): ?string
    {
        return $this->attestation;
    }

    public function setAttestation(string $attestation): static
    {
        $this->attestation = $attestation;

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
            $competenceStage->setNstages($this);
        }

        return $this;
    }

    public function removeCompetenceStage(CompetenceStage $competenceStage): static
    {
        if ($this->competenceStages->removeElement($competenceStage)) {
            // set the owning side to null (unless already changed)
            if ($competenceStage->getNstages() === $this) {
                $competenceStage->setNstages(null);
            }
        }

        return $this;
    }

    public function getRapport(): ?string
    {
        return $this->rapport;
    }

    public function setRapport(?string $rapport): static
    {
        $this->rapport = $rapport;

        return $this;
    }

    public function getImgRapport(): ?string
    {
        return $this->img_rapport;
    }

    public function setImgRapport(?string $img_rapport): static
    {
        $this->img_rapport = $img_rapport;

        return $this;
    }

    public function getPowerpoint(): ?string
    {
        return $this->powerpoint;
    }

    public function setPowerpoint(?string $powerpoint): static
    {
        $this->powerpoint = $powerpoint;

        return $this;
    }

    public function getImgPowerpoint(): ?string
    {
        return $this->img_powerpoint;
    }

    public function setImgPowerpoint(?string $img_powerpoint): static
    {
        $this->img_powerpoint = $img_powerpoint;

        return $this;
    }
}
