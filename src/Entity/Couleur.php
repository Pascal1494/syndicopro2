<?php
namespace App\Entity;

use App\Repository\CouleurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CouleurRepository::class)]
class Couleur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 7, nullable: true)]
    private ?string $codeHexa = null;

    /**
     * @var Collection<int, Badge>
     */
    #[ORM\OneToMany(targetEntity: Badge::class, mappedBy: 'couleur')]
    private Collection $badges;

    /**
     * @var Collection<int, StockBadge>
     */
    #[ORM\OneToMany(targetEntity: StockBadge::class, mappedBy: 'couleur')]
    private Collection $stockBadges;

    public function __construct()
    {
        $this->badges      = new ArrayCollection();
        $this->stockBadges = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->nom ?? 'Sans couleur'; // ou la propriété qui contient le nom de ta couleur
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCodeHexa(): ?string
    {
        return $this->codeHexa;
    }

    public function setCodeHexa(?string $codeHexa): static
    {
        $this->codeHexa = $codeHexa;

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
            $badge->setCouleur($this);
        }

        return $this;
    }

    public function removeBadge(Badge $badge): static
    {
        if ($this->badges->removeElement($badge)) {
            // set the owning side to null (unless already changed)
            if ($badge->getCouleur() === $this) {
                $badge->setCouleur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, StockBadge>
     */
    public function getStockBadges(): Collection
    {
        return $this->stockBadges;
    }

    public function addStockBadge(StockBadge $stockBadge): static
    {
        if (! $this->stockBadges->contains($stockBadge)) {
            $this->stockBadges->add($stockBadge);
            $stockBadge->setCouleur($this);
        }

        return $this;
    }

    public function removeStockBadge(StockBadge $stockBadge): static
    {
        if ($this->stockBadges->removeElement($stockBadge)) {
            // set the owning side to null (unless already changed)
            if ($stockBadge->getCouleur() === $this) {
                $stockBadge->setCouleur(null);
            }
        }

        return $this;
    }
}
