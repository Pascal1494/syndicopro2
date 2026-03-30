<?php
namespace App\Entity;

use App\Repository\StockBadgeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StockBadgeRepository::class)]
class StockBadge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'stockBadges')]
    #[ORM\JoinColumn(nullable: false)] // <-- ON AJOUTE CECI : Impossible de créer un stock sans copropriété
    private ?Copropriete $copropriete = null;

    #[ORM\ManyToOne(inversedBy: 'stockBadges')]
    #[ORM\JoinColumn(nullable: false)] // <-- ON AJOUTE CECI : Impossible de créer un stock sans copropriété
    private ?Couleur $couleur = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column]
    private ?int $seuilAlerte = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCouleur(): ?Couleur
    {
        return $this->couleur;
    }

    public function setCouleur(?Couleur $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getSeuilAlerte(): ?int
    {
        return $this->seuilAlerte;
    }

    public function setSeuilAlerte(?int $seuilAlerte): static
    {
        $this->seuilAlerte = $seuilAlerte;

        return $this;
    }
}
