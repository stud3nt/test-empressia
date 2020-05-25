<?php

namespace App\Entity;

use App\Entity\Base\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("apartments")
 * @ORM\Entity(repositoryClass="App\Repository\ApartmentRepository")
 */
class Apartment extends AbstractEntity
{
    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description = null;

    /**
     * @var int
     * @ORM\Column(name="slot_day_price", type="decimal", precision=7, scale=2, options={"default":0.00})
     */
    protected $slotDayPrice = 0;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ApartmentSlot", mappedBy="apartment")
     */
    protected $slots;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $createdAt = null;

    public function __construct()
    {
        if (!$this->id) {
            $this->createdAt = new \DateTime();
        }

        $this->slots = new ArrayCollection();
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|ApartmentSlot[]
     */
    public function getSlots(): Collection
    {
        return $this->slots;
    }

    public function addSlot(ApartmentSlot $slot): self
    {
        if (!$this->slots->contains($slot)) {
            $this->slots[] = $slot;
            $slot->setApartment($this);
        }

        return $this;
    }

    public function removeSlot(ApartmentSlot $slot): self
    {
        if ($this->slots->contains($slot)) {
            $this->slots->removeElement($slot);
            // set the owning side to null (unless already changed)
            if ($slot->getApartment() === $this) {
                $slot->setApartment(null);
            }
        }

        return $this;
    }

    public function getSlotDayPrice(): ?string
    {
        return $this->slotDayPrice;
    }

    public function setSlotDayPrice(string $slotDayPrice): self
    {
        $this->slotDayPrice = $slotDayPrice;

        return $this;
    }
}
