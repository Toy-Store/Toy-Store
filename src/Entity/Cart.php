<?php

namespace App\Entity;

use App\Repository\CartRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartRepository::class)]
class Cart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\ManyToOne(inversedBy: 'carts')]
    private ?Product $procart = null;

    #[ORM\ManyToOne(inversedBy: 'carts')]
    private ?User $usercart = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getProcart(): ?Product
    {
        return $this->procart;
    }

    public function setProcart(?Product $procart): self
    {
        $this->procart = $procart;

        return $this;
    }

    public function getUsercart(): ?User
    {
        return $this->usercart;
    }

    public function setUsercart(?User $usercart): self
    {
        $this->usercart = $usercart;

        return $this;
    }
}
