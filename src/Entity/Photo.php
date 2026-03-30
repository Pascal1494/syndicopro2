<?php
namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoRepository::class)]
class Photo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomFichier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne]
    private ?Batiment $batiment = null;

    #[ORM\ManyToOne(inversedBy: 'photos')]
    private ?Copropriete $copropriete = null;

    #[ORM\ManyToOne(inversedBy: 'photos')]
    private ?User $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'photos')]
    private ?Badge $badge = null;

    #[ORM\ManyToOne(inversedBy: 'photos')]
    private ?Incident $incident = null;

    #[ORM\ManyToOne(inversedBy: 'photos')]
    private ?MenueDepense $menueDepense = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFichier(): ?string
    {
        return $this->nomFichier;
    }

    public function setNomFichier(string $nomFichier): static
    {
        $this->nomFichier = $nomFichier;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getBatiment(): ?Batiment
    {
        return $this->batiment;
    }

    public function setBatiment(?Batiment $batiment): static
    {
        $this->batiment = $batiment;

        return $this;
    }

    public function getCopropriete(): ?Copropriete
    {
        return $this->copropriete;
    }

    public function setCopropriete(?Copropriete $copropriete): static
    {
        $this->copropriete = $copropriete;

        return $this;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getBadge(): ?Badge
    {
        return $this->badge;
    }

    public function setBadge(?Badge $badge): static
    {
        $this->badge = $badge;

        return $this;
    }

    public function getIncident(): ?Incident
    {
        return $this->incident;
    }

    public function setIncident(?Incident $incident): static
    {
        $this->incident = $incident;

        return $this;
    }

    public function getMenueDepense(): ?MenueDepense
    {
        return $this->menueDepense;
    }

    public function setMenueDepense(?MenueDepense $menueDepense): static
    {
        $this->menueDepense = $menueDepense;

        return $this;
    }
}
