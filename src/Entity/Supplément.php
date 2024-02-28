<?php

namespace App\Entity;

use App\Repository\SupplémentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SupplémentRepository::class)]
class Supplément
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $type = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\ManyToMany(targetEntity: Plat::class, inversedBy: 'supplement')]
    private Collection $id_plat;

    public function __construct()
    {
        $this->id_plat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
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
}
