<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Boy = null;

    #[ORM\Column(length: 255)]
    private ?string $Girl = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBoy(): ?string
    {
        return $this->Boy;
    }

    public function setBoy(string $Boy): self
    {
        $this->Boy = $Boy;

        return $this;
    }

    public function getGirl(): ?string
    {
        return $this->Girl;
    }

    public function setGirl(string $Girl): self
    {
        $this->Girl = $Girl;

        return $this;
    }

   
}
