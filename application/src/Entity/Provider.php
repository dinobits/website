<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProviderRepository")
 */
class Provider
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProviderType", inversedBy="providers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Provider", mappedBy="type")
     */
    private $providers;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductInventory", mappedBy="provider")
     */
    private $productInventories;

    public function __construct()
    {
        $this->providers = new ArrayCollection();
        $this->productInventories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?ProviderType
    {
        return $this->type;
    }

    public function setType(?ProviderType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getProviders(): Collection
    {
        return $this->providers;
    }

    public function addProvider(self $provider): self
    {
        if (!$this->providers->contains($provider)) {
            $this->providers[] = $provider;
            $provider->setType($this);
        }

        return $this;
    }

    public function removeProvider(self $provider): self
    {
        if ($this->providers->contains($provider)) {
            $this->providers->removeElement($provider);
            // set the owning side to null (unless already changed)
            if ($provider->getType() === $this) {
                $provider->setType(null);
            }
        }

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
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
            $productInventory->setProvider($this);
        }

        return $this;
    }

    public function removeProductInventory(ProductInventory $productInventory): self
    {
        if ($this->productInventories->contains($productInventory)) {
            $this->productInventories->removeElement($productInventory);
            // set the owning side to null (unless already changed)
            if ($productInventory->getProvider() === $this) {
                $productInventory->setProvider(null);
            }
        }

        return $this;
    }
}
