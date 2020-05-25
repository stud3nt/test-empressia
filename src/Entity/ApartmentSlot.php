<?php

namespace App\Entity;

use App\Entity\Base\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("apartments_slots")
 * @ORM\Entity(repositoryClass="App\Repository\ApartmentSlotRepository")
 */
class ApartmentSlot extends AbstractEntity
{
    /**
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description = null;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $createdAt = null;

    /**
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt = null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Apartment", inversedBy="slots")
     * @ORM\JoinColumn(name="apartment_id", referencedColumnName="id")
     */
    protected $apartment;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ApartmentSlotReservation", mappedBy="apartment")
     */
    protected $reservations;

    public function __construct()
    {
        if (!$this->id) {
            $this->createdAt = new \DateTime();
        }
        $this->reservations = new ArrayCollection();
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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getApartment(): ?Apartment
    {
        return $this->apartment;
    }

    public function setApartment(?Apartment $apartment): self
    {
        $this->apartment = $apartment;

        return $this;
    }

    /**
     * @return Collection|ApartmentSlotReservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(ApartmentSlotReservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setApartment($this);
        }

        return $this;
    }

    public function removeReservation(ApartmentSlotReservation $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getApartment() === $this) {
                $reservation->setApartment(null);
            }
        }

        return $this;
    }
}
