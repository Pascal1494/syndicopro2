<?php

namespace App\Entity;

use App\Repository\MenueDepenseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenueDepenseRepository::class)]
class MenueDepense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fournisseur = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateAchat = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionUsage = null;

    #[ORM\Column(nullable: true)]
    private ?float $prixUnitaireHt = null;

    #[ORM\Column]
    private ?float $prixUnitaireTtc = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column]
    private ?float $totalTtc = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'menueDepenses')]
    private ?User $acheteur = null;

    #[ORM\ManyToOne(inversedBy: 'menueDepenses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Copropriete $copropriete = null;

    /**
     * @var Collection<int, Photo>
     */
    #[ORM\OneToMany(targetEntity: Photo::class, mappedBy: 'menueDepense', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $photos;

    #[ORM\ManyToOne(inversedBy: 'depenses')]
    private ?CaisseConseil $caisseConseil = null;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
        $this->statut = 'En attente';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): static
    {
        $this->designation = $designation;
        return $this;
    }

    public function getFournisseur(): ?string
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?string $fournisseur): static
    {
        $this->fournisseur = $fournisseur;
        return $this;
    }

    public function getDateAchat(): ?\DateTime
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTime $dateAchat): static
    {
        $this->dateAchat = $dateAchat;
        return $this;
    }

    public function getDescriptionUsage(): ?string
    {
        return $this->descriptionUsage;
    }

    public function setDescriptionUsage(?string $descriptionUsage): static
    {
        $this->descriptionUsage = $descriptionUsage;
        return $this;
    }

    public function getPrixUnitaireHt(): ?float
    {
        return $this->prixUnitaireHt;
    }

    public function setPrixUnitaireHt(?float $prixUnitaireHt): static
    {
        $this->prixUnitaireHt = $prixUnitaireHt;
        return $this;
    }

    public function getPrixUnitaireTtc(): ?float
    {
        return $this->prixUnitaireTtc;
    }

    public function setPrixUnitaireTtc(float $prixUnitaireTtc): static
    {
        $this->prixUnitaireTtc = $prixUnitaireTtc;
        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;
        return $this;
    }

    public function getTotalTtc(): ?float
    {
        return $this->totalTtc;
    }

    public function setTotalTtc(float $totalTtc): static
    {
        $this->totalTtc = $totalTtc;
        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;
        return $this;
    }

    public function getAcheteur(): ?User
    {
        return $this->acheteur;
    }

    public function setAcheteur(?User $acheteur): static
    {
        $this->acheteur = $acheteur;
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

    /**
     * @return Collection<int, Photo>
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): static
    {
        if (!$this->photos->contains($photo)) {
            $this->photos->add($photo);
            $photo->setMenueDepense($this);
        }
        return $this;
    }

    public function removePhoto(Photo $photo): static
    {
        if ($this->photos->removeElement($photo)) {
            if ($photo->getMenueDepense() === $this) {
                $photo->setMenueDepense(null);
            }
        }
        return $this;
    }

    public function getCaisseConseil(): ?CaisseConseil
    {
        return $this->caisseConseil;
    }

    public function setCaisseConseil(?CaisseConseil $caisseConseil): static
    {
        $this->caisseConseil = $caisseConseil;
        return $this;
    }
}
