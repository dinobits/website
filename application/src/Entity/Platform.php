<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlatformRepository")
 */
class Platform
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Product", mappedBy="platform")
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductInventory", mappedBy="platform")
     */
    private $productInventories;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->productInventories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addPlatform($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            $product->removePlatform($this);
        }

        return $this;
    }

    /**
     * @return Collection|ProductInventory[]
     */
    public function getProductInventories(): Collection
    {
        return $this->productInventories;
    }

    public function addProductInventory(ProductInventory $productInventory): self
    {
        if (!$this->productInventories->contains($productInventory)) {
            $this->productInventories[] = $productInventory;
        }

        return $this;
    }

    public function removeProductInventory(ProductInventory $productInventory): self
    {
        if ($this->productInventories->contains($productInventory)) {
            $this->productInventories->removeElement($productInventory);
        }

        return $this;
    }
}
