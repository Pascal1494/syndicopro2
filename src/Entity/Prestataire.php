<?php
namespace App\Entity;

use App\Repository\PrestataireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestataireRepository::class)]
class Prestataire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $domaine = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telephone = null;

    /**
     * @var Collection<int, Copropriete>
     */
    #[ORM\ManyToMany(targetEntity: Copropriete::class, inversedBy: 'prestataires')]
    private Collection $coproprietes;

    public function __construct()
    {
        $this->coproprietes = new ArrayCollection();
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

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(string $domaine): static
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection<int, Copropriete>
     */
    public function getCoproprietes(): Collection
    {
        return $this->coproprietes;
    }

    public function addCopropriete(Copropriete $copropriete): static
    {
        if (! $this->coproprietes->contains($copropriete)) {
            $this->coproprietes->add($copropriete);
        }

        return $this;
    }

    public function removeCopropriete(Copropriete $coproprietes): static
    {
        $this->coproprietes->removeElement($copropriete);

        return $this;
    }

    // src / Entity / Prestataire . php;
    public function __toString(): string
    {
        return $this->nom; // Affiche le nom de l'entreprise au lieu de "Prestataire #1"
    }
}
