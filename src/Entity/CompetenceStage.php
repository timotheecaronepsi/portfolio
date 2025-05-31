<?php

namespace App\Entity;

use App\Repository\CompetenceStageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetenceStageRepository::class)]
class CompetenceStage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'competenceStages')]
    private ?Stage $Nstages = null;

    #[ORM\ManyToOne(inversedBy: 'competenceStages')]
    private ?Competence $Ncompetencesstages = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $justification_text = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $justification_img = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNstages(): ?Stage
    {
        return $this->Nstages;
    }

    public function setNstages(?Stage $Nstages): static
    {
        $this->Nstages = $Nstages;

        return $this;
    }

    public function getNcompetencesstages(): ?Competence
    {
        return $this->Ncompetencesstages;
    }

    public function setNcompetencesstages(?Competence $Ncompetencesstages): static
    {
        $this->Ncompetencesstages = $Ncompetencesstages;

        return $this;
    }

    public function getJustificationText(): ?string
    {
        return $this->justification_text;
    }

    public function setJustificationText(?string $justification_text): static
    {
        $this->justification_text = $justification_text;

        return $this;
    }

    public function getJustificationImg(): ?string
    {
        return $this->justification_img;
    }

    public function setJustificationImg(?string $justification_img): static
    {
        $this->justification_img = $justification_img;

        return $this;
    }
}
