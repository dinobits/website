<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductInventoryRepository")
 */
class ProductInventory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="productInventories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Provider", inversedBy="productInventories")
     */
    private $provider;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Platform", inversedBy="productInventories")
     */
    private $platform;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="productInventories")
     */
    private $claimed_by;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $date_created;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $date_updated;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $date_claimed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_active;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_enabled;

    public function __construct()
    {
        $this->date_created = new DateTimeImmutable();
        $this->date_updated = new DateTimeImmutable();
        $this->is_active = false;
        $this->is_enabled = true;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getProvider(): ?Provider
    {
        return $this->provider;
    }

    public function setProvider(?Provider $provider): self
    {
        $this->provider = $provider;

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

    /**
     * @return Platform
     */
    public function getPlatform(): ?Platform
    {
        return $this->platform;
    }

    public function setPlatform(?Platform $platform): self
    {
        $this->platform = $platform;

        return $this;
    }


    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getClaimedBy(): ?User
    {
        return $this->claimed_by;
    }

    public function setClaimedBy(?User $claimed_by): self
    {
        $this->claimed_by = $claimed_by;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getDateCreated(): ?DateTimeImmutable
    {
        return $this->date_created;
    }

    public function setDateCreated(DateTimeImmutable $date_created): self
    {
        $this->date_created = $date_created;

        return $this;
    }

    public function getDateUpdated(): ?DateTimeImmutable
    {
        return $this->date_updated;
    }

    public function setDateUpdated(DateTimeImmutable $date_updated): self
    {
        $this->date_updated = $date_updated;

        return $this;
    }

    public function getDateClaimed(): ?DateTimeImmutable
    {
        return $this->date_claimed;
    }

    public function setDateClaimed(?DateTimeImmutable $date_claimed): self
    {
        $this->date_claimed = $date_claimed;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): self
    {
        $this->is_active = $is_active;

        return $this;
    }

    public function getIsEnabled(): ?bool
    {
        return $this->is_enabled;
    }

    public function setIsEnabled(bool $is_enabled): self
    {
        $this->is_enabled = $is_enabled;

        return $this;
    }
}
