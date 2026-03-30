<?php
namespace App\Entity;

use App\Repository\DepenseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepenseRepository::class)]
class Depense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column]
    private ?float $montant = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $datePaiement = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable : false)]
    private ?copropriete $copropriete = null;

    #[ORM\ManyToOne(inversedBy: 'depenses')]
    private ?batiment $batiment = null;

    #[ORM\ManyToOne(inversedBy: 'depenses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CategorieDepense $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDatePaiement(): ?\DateTimeImmutable
    {
        return $this->datePaiement;
    }

    public function setDatePaiement(\DateTimeImmutable $datePaiement): static
    {
        $this->datePaiement = $datePaiement;

        return $this;
    }

    public function getCopropriete(): ?copropriete
    {
        return $this->copropriete;
    }

    public function setCopropriete(?copropriete $copropriété): static
    {
        $this->copropriete = $copropriete;

        return $this;
    }

    public function getBatiment(): ?batiment
    {
        return $this->batiment;
    }

    public function setBatiment(?batiment $batiment): static
    {
        $this->batiment = $batiment;

        return $this;
    }

    public function getCategorie(): ?CategorieDepense
    {
        return $this->categorie;
    }

    public function setCategorie(?CategorieDepense $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }
}
