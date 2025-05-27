<?php

namespace App\Entity;

use App\Repository\CompetenceProjetRepository;
use Doctrine\DBAL\Types\Types;
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

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $justification_text = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $justification_img = null;

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
