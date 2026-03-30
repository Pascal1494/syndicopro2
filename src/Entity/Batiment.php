<?php
namespace App\Entity;

use App\Repository\BatimentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BatimentRepository::class)]
class Batiment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $nombreEtage = null;

    #[ORM\Column]
    private ?bool $asAscenceur = null;

    #[ORM\ManyToOne(inversedBy: 'batiments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Copropriete $copropriete = null;

    /**
     * @var Collection<int, Lot>
     */
    #[ORM\OneToMany(targetEntity: Lot::class, mappedBy: 'batiment')]
    private Collection $lots;

    /**
     * @var Collection<int, Depense>
     */
    #[ORM\OneToMany(targetEntity: Depense::class, mappedBy: 'batiment')]
    private Collection $depenses;

    /**
     * @var Collection<int, Incident>
     */
    #[ORM\OneToMany(targetEntity: Incident::class, mappedBy: 'batiment')]
    private Collection $incidents;

    public function __construct()
    {
        $this->lots      = new ArrayCollection();
        $this->depenses  = new ArrayCollection();
        $this->incidents = new ArrayCollection();
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

    public function getNombreEtage(): ?int
    {
        return $this->nombreEtage;
    }

    public function setNombreEtage(int $nombreEtage): static
    {
        $this->nombreEtage = $nombreEtage;

        return $this;
    }

    public function isAsAscenceur(): ?bool
    {
        return $this->asAscenceur;
    }

    public function setAsAscenceur(bool $asAscenceur): static
    {
        $this->asAscenceur = $asAscenceur;

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
     * @return Collection<int, Lot>
     */
    public function getLots(): Collection
    {
        return $this->lots;
    }

    public function addLot(Lot $lot): static
    {
        if (! $this->lots->contains($lot)) {
            $this->lots->add($lot);
            $lot->setBatiment($this);
        }

        return $this;
    }

    public function removeLot(Lot $lot): static
    {
        if ($this->lots->removeElement($lot)) {
            // set the owning side to null (unless already changed)
            if ($lot->getBatiment() === $this) {
                $lot->setBatiment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Depense>
     */
    public function getDepenses(): Collection
    {
        return $this->depenses;
    }

    public function addDepense(Depense $depense): static
    {
        if (! $this->depenses->contains($depense)) {
            $this->depenses->add($depense);
            $depense->setBatiment($this);
        }

        return $this;
    }

    public function removeDepense(Depense $depense): static
    {
        if ($this->depenses->removeElement($depense)) {
            // set the owning side to null (unless already changed)
            if ($depense->getBatiment() === $this) {
                $depense->setBatiment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Incident>
     */
    public function getIncidents(): Collection
    {
        return $this->incidents;
    }

    public function addIncident(Incident $incident): static
    {
        if (! $this->incidents->contains($incident)) {
            $this->incidents->add($incident);
            $incident->setBatiment($this);
        }

        return $this;
    }

    public function removeIncident(Incident $incident): static
    {
        if ($this->incidents->removeElement($incident)) {
            // set the owning side to null (unless already changed)
            if ($incident->getBatiment() === $this) {
                $incident->setBatiment(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        // Ça affichera par exemple : "Bâtiment A (Résidence Les Lilas)"
        $coproNom = $this->getCopropriete() ? $this->getCopropriete()->getNom() : 'Sans Copro';
        return $this->getNom() . ' (' . $coproNom . ')';
    }
}
