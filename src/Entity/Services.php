<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $duration = null;

    #[ORM\OneToMany(targetEntity: Reservations::class, mappedBy: 'services')]
    private Collection $service;

    #[ORM\OneToMany(targetEntity: Commentaires::class, mappedBy: 'services')]
    private Collection $services;

    public function __construct()
    {
        $this->service = new ArrayCollection();
        $this->services = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(\DateTimeInterface $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return Collection<int, Reservations>
     */
    public function getService(): Collection
    {
        return $this->service;
    }

    public function addService(Reservations $service): static
    {
        if (!$this->service->contains($service)) {
            $this->service->add($service);
            $service->setServices($this);
        }

        return $this;
    }

    public function removeService(Reservations $service): static
    {
        if ($this->service->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getServices() === $this) {
                $service->setServices(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commentaires>
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

  
}