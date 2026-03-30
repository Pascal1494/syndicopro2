<?php
namespace App\Entity;

use App\Entity\Couleur;
use App\Repository\BadgeRepository;
use App\Validator\StockSuffisant; // <-- 1. AJOUTE CET IMPORT

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BadgeRepository::class)]
#[StockSuffisant] // <-- 2. AJOUTE CETTE ÉTIQUETTE MAGIQUE ICI
class Badge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $numeroHexa = null;

    #[ORM\Column(length: 20)]
    private ?string $status = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateActivation = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable : false)]
    private ?Lot $lot = null;

    #[ORM\OneToOne(targetEntity: self::class, cascade: ['persist', 'remove'])]
    private ?self $remplacebadge = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $motifRemplacement = null;

    /**
     * @var Collection<int, Photo>
     */
    #[ORM\OneToMany(targetEntity: Photo::class, mappedBy: 'badge')]
    private Collection $photos;

    #[ORM\ManyToOne(inversedBy: 'badges')]
    private ?Couleur $couleur = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $dateRemplacement = null;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }

    public function __toString() : string
    {
        // Quand Symfony veut afficher ce badge sous forme de texte,
        // on lui donne le numéro Hexadécimal (ou une chaîne vide s'il n'en a pas encore)
        return $this->numeroHexa ?? 'Badge sans numéro';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroHexa(): ?string
    {
        return $this->numeroHexa;
    }

    public function setNumeroHexa(string $numeroHexa): static
    {
        $this->numeroHexa = $numeroHexa;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getDateActivation(): ?\DateTimeImmutable
    {
        return $this->dateActivation;
    }

    public function setDateActivation(\DateTimeImmutable $dateActivation): static
    {
        $this->dateActivation = $dateActivation;

        return $this;
    }

    public function getLot(): ?Lot
    {
        return $this->lot;
    }

    public function setLot(?Lot $lot): static
    {
        $this->lot = $lot;

        return $this;
    }

    public function getRemplacebadge(): ?self
    {
        return $this->remplacebadge;
    }

    public function setRemplacebadge(?self $remplacebadge): static
    {
        $this->remplacebadge = $remplacebadge;

        return $this;
    }

    public function getMotifRemplacement(): ?string
    {
        return $this->motifRemplacement;
    }

    public function setMotifRemplacement(?string $motifRemplacement): static
    {
        $this->motifRemplacement = $motifRemplacement;

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
        if (! $this->photos->contains($photo)) {
            $this->photos->add($photo);
            $photo->setBadge($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): static
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getBadge() === $this) {
                $photo->setBadge(null);
            }
        }

        return $this;
    }

    public function getCouleur(): ?Couleur
    {
        return $this->couleur;
    }

    public function setCouleur(?couleur $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getDateRemplacement(): ?\DateTimeImmutable
    {
        return $this->dateRemplacement;
    }

    public function setDateRemplacement( ? \DateTimeImmutable $dateRemplacement): static
    {
        $this->dateRemplacement = $dateRemplacement;

        return $this;
    }
}
