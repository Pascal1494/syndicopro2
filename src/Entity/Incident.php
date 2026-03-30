<?php
namespace App\Entity;

use App\Repository\IncidentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IncidentRepository::class)]
class Incident
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 50)]
    private ?string $statut = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateCreation = null;

    #[ORM\ManyToOne(inversedBy : 'incidentsDeclares')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $declarant = null;

    #[ORM\ManyToOne(inversedBy: 'incidents')]
    private ?Batiment $batiment = null;

    /**
     * @var Collection<int, Photo>
     */
    #[ORM\OneToMany(targetEntity: Photo::class, mappedBy: 'incident', cascade: ['persist', 'remove'], )]

    private Collection $photos;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $dateIntervention = null;

    #[ORM\Column(nullable : true)]
    private ?\DateTimeImmutable $dateResolution = null;

    #[ORM\Column(type : Types::TEXT, nullable: true)]
    private ?string $commentaireReparateur = null;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }

    public function __toString(): string
    {
        // On retourne le nom du fichier, ou une chaîne vide si c'est une nouvelle photo
        return $this->nomFichier ?? 'Nouvelle Photo';
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeImmutable $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDeclarant(): ?User
    {
        return $this->declarant;
    }

    public function setDeclarant(?User $declarant): static
    {
        $this->declarant = $declarant;

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
            $photo->setIncident($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): static
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getIncident() === $this) {
                $photo->setIncident(null);
            }
        }

        return $this;
    }

    public function getDateIntervention(): ?\DateTimeImmutable
    {
        return $this->dateIntervention;
    }

    public function setDateIntervention( ? \DateTimeImmutable $dateIntervention): static
    {
        $this->dateIntervention = $dateIntervention;

        return $this;
    }

    public function getDateResolution(): ?\DateTimeImmutable
    {
        return $this->dateResolution;
    }

    public function setDateResolution( ? \DateTimeImmutable $dateResolution): static
    {
        $this->dateResolution = $dateResolution;

        return $this;
    }

    public function getCommentaireReparateur(): ?string
    {
        return $this->commentaireReparateur;
    }

    public function setCommentaireReparateur(?string $commentaireReparateur): static
    {
        $this->commentaireReparateur = $commentaireReparateur;

        return $this;
    }
}
