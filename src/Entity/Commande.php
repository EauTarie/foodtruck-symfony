<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
#[ApiResource]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Plat::class, inversedBy: 'commandes')]
    private Collection $id_plat;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $id_utilisateur = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $shipped_at = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $annulation_description = null;

    public function __construct()
    {
        $this->id_plat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Plat>
     */
    public function getIdPlat(): Collection
    {
        return $this->id_plat;
    }

    public function addIdPlat(Plat $idPlat): static
    {
        if (!$this->id_plat->contains($idPlat)) {
            $this->id_plat->add($idPlat);
        }

        return $this;
    }

    public function removeIdPlat(Plat $idPlat): static
    {
        $this->id_plat->removeElement($idPlat);

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $id_utilisateur): static
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getShippedAt(): ?\DateTimeImmutable
    {
        return $this->shipped_at;
    }

    public function setShippedAt(?\DateTimeImmutable $shipped_at): static
    {
        $this->shipped_at = $shipped_at;

        return $this;
    }

    public function getAnnulationDescription(): ?string
    {
        return $this->annulation_description;
    }

    public function setAnnulationDescription(?string $annulation_description): static
    {
        $this->annulation_description = $annulation_description;

        return $this;
    }
}
