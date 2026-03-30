<?php
namespace App\Entity;

use App\Repository\CoproprieteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoproprieteRepository::class)]
class Copropriete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $adresse = null;

    #[ORM\Column(length: 10)]
    private ?string $codePostal = null;

    /**
     * @var Collection<int, Batiment>
     */
    #[ORM\OneToMany(targetEntity: Batiment::class, mappedBy: 'copropriete')]
    private Collection $batiments;

    /**
     * @var Collection<int, Photo>
     */
    #[ORM\OneToMany(targetEntity: Photo::class, mappedBy: 'copropriete')]
    private Collection $photos;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    /**
     * @var Collection<int, StockBadge>
     */
    #[ORM\OneToMany(targetEntity: StockBadge::class, mappedBy: 'copropriete')]
    private Collection $stockBadges;

    /**
     * @var Collection<int, Prestataire>
     */
    #[ORM\ManyToMany(targetEntity: Prestataire::class, mappedBy: 'coproprietes')]
    private Collection $prestataires;

    /**
     * @var Collection<int, MenueDepense>
     */
    #[ORM\OneToMany(targetEntity: MenueDepense::class, mappedBy: 'copropriete')]
    private Collection $menueDepenses;

    /**
     * @var Collection<int, Document>
     */
    #[ORM\OneToMany(targetEntity: Document::class, mappedBy: 'copropriete')]
    private Collection $documents;

    public function __construct()
    {
        $this->batiments    = new ArrayCollection();
        $this->photos       = new ArrayCollection();
        $this->stockBadges  = new ArrayCollection();
        $this->prestataires = new ArrayCollection();
        $this->menueDepenses = new ArrayCollection();
        $this->documents = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->nom ?? 'Copropriété sans nom';
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * @return Collection<int, Batiment>
     */
    public function getBatiments(): Collection
    {
        return $this->batiments;
    }

    public function addBatiment(Batiment $batiment): static
    {
        if (! $this->batiments->contains($batiment)) {
            $this->batiments->add($batiment);
            $batiment->setCopropriete($this);
        }

        return $this;
    }

    public function removeBatiment(Batiment $batiment): static
    {
        if ($this->batiments->removeElement($batiment)) {
            // set the owning side to null (unless already changed)
            if ($batiment->getCopropriete() === $this) {
                $batiment->setCopropriete(null);
            }
        }

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
            $photo->setCopropriete($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): static
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getCopropriete() === $this) {
                $photo->setCopropriete(null);
            }
        }

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

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
            $stockBadge->setCopropriete($this);
        }

        return $this;
    }

    public function removeStockBadge(StockBadge $stockBadge): static
    {
        if ($this->stockBadges->removeElement($stockBadge)) {
            // set the owning side to null (unless already changed)
            if ($stockBadge->getCopropriete() === $this) {
                $stockBadge->setCopropriete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Prestataire>
     */
    public function getPrestataires(): Collection
    {
        return $this->prestataires;
    }

    public function addPrestataire(Prestataire $prestataire): static
    {
        if (! $this->prestataires->contains($prestataire)) {
            $this->prestataires->add($prestataire);
            $prestataire->addCopropriete($this);
        }

        return $this;
    }

    public function removePrestataire(Prestataire $prestataire): static
    {
        if ($this->prestataires->removeElement($prestataire)) {
            $prestataire->removeCopropriete($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, MenueDepense>
     */
    public function getMenueDepenses(): Collection
    {
        return $this->menueDepenses;
    }

    public function addMenueDepense(MenueDepense $menueDepense): static
    {
        if (!$this->menueDepenses->contains($menueDepense)) {
            $this->menueDepenses->add($menueDepense);
            $menueDepense->setCopropriete($this);
        }

        return $this;
    }

    public function removeMenueDepense(MenueDepense $menueDepense): static
    {
        if ($this->menueDepenses->removeElement($menueDepense)) {
            // set the owning side to null (unless already changed)
            if ($menueDepense->getCopropriete() === $this) {
                $menueDepense->setCopropriete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): static
    {
        if (!$this->documents->contains($document)) {
            $this->documents->add($document);
            $document->setCopropriete($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): static
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getCopropriete() === $this) {
                $document->setCopropriete(null);
            }
        }

        return $this;
    }
}
