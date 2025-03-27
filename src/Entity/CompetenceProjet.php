<?php

namespace App\Entity;

use App\Repository\CompetenceProjetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetenceProjetRepository::class)]
class CompetenceProjet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'competenceProjets')]
    private ?Projet $Nprojets = null;

    #[ORM\ManyToOne(inversedBy: 'competenceProjets')]
    private ?Competence $NCompetence = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNprojets(): ?Projet
    {
        return $this->Nprojets;
    }

    public function setNprojets(?Projet $Nprojets): static
    {
        $this->Nprojets = $Nprojets;

        return $this;
    }

    public function getNCompetence(): ?Competence
    {
        return $this->NCompetence;
    }

    public function setNCompetence(?Competence $NCompetence): static
    {
        $this->NCompetence = $NCompetence;

        return $this;
    }
}
