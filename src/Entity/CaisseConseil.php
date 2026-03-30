<?php
namespace App\Entity;

use App\Repository\CaisseConseilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaisseConseilRepository::class)]
class CaisseConseil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $montantInitial = null;

    #[ORM\OneToOne(inversedBy: 'caisseConseil', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Copropriete $copropriete = null;

    #[ORM\OneToMany(mappedBy: 'caisseConseil', targetEntity: MenueDepense::class)]
    private Collection $depenses;

    #[ORM\Transient] // EA5 + Doctrine 3
    private ?string $soldeAffiche = null;

    public function __construct()
    {
        $this->depenses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantInitial(): ?float
    {
        return $this->montantInitial;
    }

    public function setMontantInitial(float $montantInitial): static
    {
        $this->montantInitial = $montantInitial;
        return $this;
    }

    public function getCopropriete(): ?Copropriete
    {
        return $this->copropriete;
    }

    public function setCopropriete(Copropriete $copropriete): static
    {
        $this->copropriete = $copropriete;
        return $this;
    }

    /**
     * @return Collection<int, MenueDepense>
     */
    public function getDepenses(): Collection
    {
        return $this->depenses;
    }

    public function addDepense(MenueDepense $depense): static
    {
        if (! $this->depenses->contains($depense)) {
            $this->depenses->add($depense);
            $depense->setCaisseConseil($this);
        }
        return $this;
    }

    public function removeDepense(MenueDepense $depense): static
    {
        if ($this->depenses->removeElement($depense)) {
            if ($depense->getCaisseConseil() === $this) {
                $depense->setCaisseConseil(null);
            }
        }
        return $this;
    }

    public function getSolde(): float
    {
        $total = 0;

        foreach ($this->depenses as $depense) {
            $total += $depense->getTotalTtc();
        }

        return $this->montantInitial - $total;
    }

    public function getSoldeAffiche(): string
    {
        $solde = $this->getSolde();
        return number_format($solde, 2, ',', ' ') . ' €';
    }

}