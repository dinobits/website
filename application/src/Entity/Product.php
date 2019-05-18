<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
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
     * @ORM\ManyToOne(targetEntity="App\Entity\ProductType", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Platform", inversedBy="products")
     */
    private $platform;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductInventory", mappedBy="product")
     */
    private $productInventories;

    public function __construct()
    {
        $this->platform = new ArrayCollection();
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

    public function getType(): ?ProductType
    {
        return $this->type;
    }

    public function setType(?ProductType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Platform[]
     */
    public function getPlatform(): Collection
    {
        return $this->platform;
    }

    public function addPlatform(Platform $platform): self
    {
        if (!$this->platform->contains($platform)) {
            $this->platform[] = $platform;
        }

        return $this;
    }

    public function removePlatform(Platform $platform): self
    {
        if ($this->platform->contains($platform)) {
            $this->platform->removeElement($platform);
        }

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
            $productInventory->setProduct($this);
        }

        return $this;
    }

    public function removeProductInventory(ProductInventory $productInventory): self
    {
        if ($this->productInventories->contains($productInventory)) {
            $this->productInventories->removeElement($productInventory);
            // set the owning side to null (unless already changed)
            if ($productInventory->getProduct() === $this) {
                $productInventory->setProduct(null);
            }
        }

        return $this;
    }
}
