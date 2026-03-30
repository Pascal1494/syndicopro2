<?php
namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
// ✨ L'attribut qui fait la magie avec ton message personnalisé :
#[UniqueEntity(fields: ['email'], message: 'Cette adresse email existe déjà dans notre système.')]
#[UniqueEntity(fields: ['telephone'], message: 'Ce numéro de téléphone est déjà utilisé par un autre utilisateur.')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $horairesGardien = null;

    /**
     * @var Collection<int, Lot>
     */
    #[ORM\OneToMany(targetEntity: Lot::class, mappedBy: 'locataire')]
    private Collection $lotsLoues;

    /**
     * @var Collection<int, Lot>
     */
    #[ORM\OneToMany(targetEntity: Lot::class, mappedBy: 'proprietaire')]
    private Collection $lotsPossedes;

    /**
     * @var Collection<int, Photo>
     */
    #[ORM\OneToMany(targetEntity: Photo::class, mappedBy: 'utilisateur')]
    private Collection $photos;

    /**
     * @var Collection<int, Incident>
     */
    #[ORM\OneToMany(targetEntity: Incident::class, mappedBy: 'declarant')]
    private Collection $incidentsDeclares;

    #[ORM\ManyToOne]
    private ?Copropriete $copropriete = null;

    public function isEqualTo(UserInterface $user): bool
    {
        if (! $user instanceof self) {
            return false;
        }
        // Tant que l'ID et l'Email ne changent pas, l'utilisateur est le même
        return $this->id === $user->getId() && $this->email === $user->getEmail();
    }

    public function __construct()
    {
        $this->lotsLoues         = new ArrayCollection();
        $this->lotsPossedes      = new ArrayCollection();
        $this->photos            = new ArrayCollection();
        $this->incidentsDeclares = new ArrayCollection();
        $this->menueDepenses     = new ArrayCollection();
        $this->documents         = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Ensure the session doesn't contain actual password hashes by CRC32C-hashing them, as supported since Symfony 7.3.
     */
    // public function __serialize(): array
    // {
    //     $data                                    = (array) $this;
    //     $data["\0" . self::class . "\0password"] = hash('crc32c', $this->password);

    //     return $data;
    // }

    public function __serialize(): array
    {
        // On ne garde que les champs nécessaires à la sécurité
        return [
            'id'       => $this->id,
            'email'    => $this->email,
            'password' => $this->password ? hash('crc32c', $this->password) : null,
            'roles'    => $this->roles,
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->id       = $data['id'] ?? null;
        $this->email    = $data['email'] ?? null;
        $this->password = $data['password'] ?? null;
        $this->roles    = $data['roles'] ?? [];
    }

    #[\Deprecated]
    public function eraseCredentials(): void
    {
        // @deprecated, to be removed when upgrading to Symfony 8
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom = mb_strtoupper($nom, 'UTF-8');

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        // mb_convert_case avec MB_CASE_TITLE est magique :
        // Il met une majuscule au début de chaque mot ET comprend les traits d'union !
        // "jean-pierre" deviendra "Jean-Pierre", "marie anne" -> "Marie Anne"
        $this->prenom = mb_convert_case($prenom, MB_CASE_TITLE, 'UTF-8');

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

    public function getHorairesGardien(): ?string
    {
        return $this->horairesGardien;
    }

    public function setHorairesGardien(?string $horairesGardien): static
    {
        $this->horairesGardien = $horairesGardien;

        return $this;
    }

    /**
     * @return Collection<int, Lot>
     */
    public function getLotsLoues(): Collection
    {
        return $this->lotsLoues;
    }

    public function addLotsLoue(Lot $lotsLoue): static
    {
        if (! $this->lotsLoues->contains($lotsLoue)) {
            $this->lotsLoues->add($lotsLoue);
            $lotsLoue->setLocataire($this);
        }

        return $this;
    }

    public function removeLotsLoue(Lot $lotsLoue): static
    {
        if ($this->lotsLoues->removeElement($lotsLoue)) {
            // set the owning side to null (unless already changed)
            if ($lotsLoue->getLocataire() === $this) {
                $lotsLoue->setLocataire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Lot>
     */
    public function getLotsPossedes(): Collection
    {
        return $this->lotsPossedes;
    }

    public function addLotsPossede(Lot $lotsPossede): static
    {
        if (! $this->lotsPossedes->contains($lotsPossede)) {
            $this->lotsPossedes->add($lotsPossede);
            $lotsPossede->setProprietaire($this);
        }

        return $this;
    }

    public function removeLotsPossede(Lot $lotsPossede): static
    {
        if ($this->lotsPossedes->removeElement($lotsPossede)) {
            // set the owning side to null (unless already changed)
            if ($lotsPossede->getProprietaire() === $this) {
                $lotsPossede->setProprietaire(null);
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
            $photo->setUtilisateur($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): static
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getUtilisateur() === $this) {
                $photo->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Incident>
     */
    public function getIncidentsDeclares(): Collection
    {
        return $this->incidentsDeclares;
    }

    public function addIncidentsDeclare(Incident $incidentsDeclare): static
    {
        if (! $this->incidentsDeclares->contains($incidentsDeclare)) {
            $this->incidentsDeclares->add($incidentsDeclare);
            $incidentsDeclare->setDeclarant($this);
        }

        return $this;
    }

    public function removeIncidentsDeclare(Incident $incidentsDeclare): static
    {
        if ($this->incidentsDeclares->removeElement($incidentsDeclare)) {
            // set the owning side to null (unless already changed)
            if ($incidentsDeclare->getDeclarant() === $this) {
                $incidentsDeclare->setDeclarant(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom; // ou la propriété qui contient le nom
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

    // Ce champ n'est PAS en base de données, c'est juste un champ "tampon"
    private ?string $plainPassword = null;

    /**
     * @var Collection<int, MenueDepense>
     */
    #[ORM\OneToMany(targetEntity: MenueDepense::class, mappedBy: 'acheteur')]
    private Collection $menueDepenses;

    /**
     * @var Collection<int, Document>
     */
    #[ORM\OneToMany(targetEntity: Document::class, mappedBy: 'createur')]
    private Collection $documents;

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;
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
        if (! $this->menueDepenses->contains($menueDepense)) {
            $this->menueDepenses->add($menueDepense);
            $menueDepense->setAcheteur($this);
        }

        return $this;
    }

    public function removeMenueDepense(MenueDepense $menueDepense): static
    {
        if ($this->menueDepenses->removeElement($menueDepense)) {
            // set the owning side to null (unless already changed)
            if ($menueDepense->getAcheteur() === $this) {
                $menueDepense->setAcheteur(null);
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
        if (! $this->documents->contains($document)) {
            $this->documents->add($document);
            $document->setCreateur($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): static
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getCreateur() === $this) {
                $document->setCreateur(null);
            }
        }

        return $this;
    }

    // ✨ LE NOUVEAU CHAMP POUR LE STATUT
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statutOccupation = null;

    #[ORM\Column]
    private bool $isVerified = false;

    public function getStatutOccupation(): ?string
    {
        return $this->statutOccupation;
    }

    public function setStatutOccupation(?string $statutOccupation): self
    {
        $this->statutOccupation = $statutOccupation;

        return $this;
    }

    /**
     * Champ virtuel pour EasyAdmin : Récupère uniquement le rôle principal
     */
    public function getRole(): ?string
    {
        // Retourne le premier rôle du tableau (ou ROLE_USER par défaut)
        return empty($this->roles) ? 'ROLE_USER' : $this->roles[0];
    }

    /**
     * Champ virtuel pour EasyAdmin : Transforme le texte en tableau pour la BDD
     */
    public function setRole(string $role): self
    {
        // On écrase le tableau existant avec ce seul rôle
        $this->roles = [$role];

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * Combine les lots possédés et loués pour un affichage unique
     */
    public function getLots(): array
    {
        return array_unique(array_merge(
            $this->lotsPossedes->toArray(),
            $this->lotsLoues->toArray()
        ), SORT_REGULAR);
    }

}
