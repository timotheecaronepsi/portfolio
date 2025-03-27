<?php

namespace App\Entity;

use App\Repository\CompetenceStageRepository;
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
}
