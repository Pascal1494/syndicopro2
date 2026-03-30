<?php
namespace App\Entity;

use App\Repository\LotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LotRepository::class)]
class Lot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $numeroLot = null;

    #[ORM\Column(length: 20)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?int $etage = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $porte = null;

    #[ORM\ManyToOne(inversedBy: 'lots')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Batiment $batiment = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'annexes')]
    #[ORM\JoinColumn(onDelete: 'SET NULL')] // <-- Ajoute cette ligne
    private ?self $parentLot = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parentLot')]
    private Collection $annexes;

    // #[ORM\ManyToOne]
    #[ORM\ManyToOne(inversedBy: 'lotsPossedes')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')] // <-- Change false par true ET ajoute onDelete
    private ?User $proprietaire = null;

    #[ORM\ManyToOne(inversedBy: 'lotsLoues')]
    #[ORM\JoinColumn(onDelete: 'SET NULL')] // <-- Ajoute cette ligne
    private ?User $locataire = null;

    #[ORM\Column(nullable: true)]
    private ?int $tantieme = null;

    /**
     * @var Collection<int, Badge>
     */
    #[ORM\OneToMany(targetEntity: Badge::class, mappedBy: 'lot')]
    private Collection $badges;

    public function __construct()
    {
        $this->annexes = new ArrayCollection();
    }

    public function __toString(): string
    {
        // On vérifie qu'on a bien un bâtiment et une copropriété attachés
        if ($this->getBatiment() && $this->getBatiment()->getCopropriete()) {
            $nomCopro    = $this->getBatiment()->getCopropriete()->getNom(); // Remplace getNom() par le vrai nom de ta fonction
            $nomBatiment = $this->getBatiment()->getNom();                   // Pareil ici

            // On affiche le chemin complet !
            return sprintf('%s - %s - Lot n°%s', $nomCopro, $nomBatiment, $this->numeroLot);
        }

        // Sécurité de base si le lot n'est lié à rien
        return 'Lot n°' . $this->numeroLot;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroLot(): ?string
    {
        return $this->numeroLot;
    }

    public function setNumeroLot(string $numeroLot): static
    {
        $this->numeroLot = $numeroLot;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getEtage(): ?int
    {
        return $this->etage;
    }

    public function setEtage(?int $etage): static
    {
        $this->etage = $etage;

        return $this;
    }

    public function getPorte(): ?string
    {
        return $this->porte;
    }

    public function setPorte(?string $porte): static
    {
        $this->porte = $porte;

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

    public function getParentLot(): ?self
    {
        return $this->parentLot;
    }

    public function setParentLot(?self $parentLot): static
    {
        $this->parentLot = $parentLot;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getAnnexes(): Collection
    {
        return $this->annexes;
    }

    public function addAnnex(self $annex): static
    {
        if (! $this->annexes->contains($annex)) {
            $this->annexes->add($annex);
            $annex->setParentLot($this);
        }

        return $this;
    }

    public function removeAnnex(self $annex): static
    {
        if ($this->annexes->removeElement($annex)) {
            // set the owning side to null (unless already changed)
            if ($annex->getParentLot() === $this) {
                $annex->setParentLot(null);
            }
        }

        return $this;
    }

    public function getProprietaire(): ?User
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?User $proprietaire): static
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getLocataire(): ?User
    {
        return $this->locataire;
    }

    public function setLocataire(?User $locataire): static
    {
        $this->locataire = $locataire;

        return $this;
    }

    public function getTantieme(): ?int
    {
        return $this->tantieme;
    }

    public function setTantieme(?int $tantieme): static
    {
        $this->tantieme = $tantieme;

        return $this;
    }

    /**
     * @return Collection<int, Badge>
     */
    public function getBadges(): Collection
    {
        return $this->badges;
    }

    public function addBadge(Badge $badge): static
    {
        if (! $this->badges->contains($badge)) {
            $this->badges->add($badge);
            $badge->setLot($this);
        }

        return $this;
    }

    public function removeBadge(Badge $badge): static
    {
        if ($this->badges->removeElement($badge)) {
            // set the owning side to null (unless already changed)
            if ($badge->getLot() === $this) {
                $badge->setLot(null);
            }
        }

        return $this;
    }
}
