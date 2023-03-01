<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'catepro', targetEntity: Product::class)]
    private Collection $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setCatepro($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getCatepro() === $this) {
                $product->setCatepro(null);
            }
        }

        return $this;
    }

   
}
