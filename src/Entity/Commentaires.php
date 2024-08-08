<?php

namespace App\Entity;

use App\Repository\CommentairesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentairesRepository::class)]
class Commentaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $rating = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $comment = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $creatAt = null;

    #[ORM\ManyToOne(inversedBy: 'services')]
    private ?Services $services = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRating(): ?string
    {
        return $this->rating;
    }

    public function setRating(string $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCreatAt(): ?\DateTimeImmutable
    {
        return $this->creatAt;
    }

    public function setCreatAt(\DateTimeImmutable $creatAt): static
    {
        $this->creatAt = $creatAt;

        return $this;
    }

    public function getServices(): ?Services
    {
        return $this->services;
    }

    public function setServices(?Services $services): static
    {
        $this->services = $services;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
