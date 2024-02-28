<?php

namespace App\Entity;

use App\Repository\PlatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlatRepository::class)]
class Plat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 75)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\ManyToMany(targetEntity: Commande::class, mappedBy: 'id_plat')]
    private Collection $commandes;

    #[ORM\ManyToMany(targetEntity: Supplément::class, mappedBy: 'id_plat')]
    private Collection $supplement;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->supplement = new ArrayCollection();
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
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->addIdPlat($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            $commande->removeIdPlat($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Supplément>
     */
    public function getSupplement(): Collection
    {
        return $this->supplement;
    }

    public function addSupplement(Supplément $supplement): static
    {
        if (!$this->supplement->contains($supplement)) {
            $this->supplement->add($supplement);
            $supplement->addIdPlat($this);
        }

        return $this;
    }

    public function removeSupplement(Supplément $supplement): static
    {
        if ($this->supplement->removeElement($supplement)) {
            $supplement->removeIdPlat($this);
        }

        return $this;
    }
}
