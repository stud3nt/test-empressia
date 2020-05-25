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
     * @var float
     * @ORM\Column(name="slot_day_price", type="decimal", precision=7, scale=2, options={"default":0.00})
     */
    protected $slotDayPrice = 0;

    /**
     * @var int
     * @ORM\Column(name="slots_count", type="integer", options={"default":1})
     */
    protected $slotsCount = 1;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ApartmentReservation", mappedBy="apartment")
     */
    protected $reservations;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $createdAt = null;

    private $actualPeoplesCount = 0;

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

    public function getSlotDayPrice(): ?string
    {
        return $this->slotDayPrice;
    }

    public function setSlotDayPrice(string $slotDayPrice): self
    {
        $this->slotDayPrice = $slotDayPrice;

        return $this;
    }

    public function getSlotsCount(): ?int
    {
        return $this->slotsCount;
    }

    public function setSlotsCount(int $slotsCount): self
    {
        $this->slotsCount = $slotsCount;

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
     * @return Collection|ApartmentReservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(ApartmentReservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setApartment($this);
        }

        return $this;
    }

    public function removeReservation(ApartmentReservation $reservation): self
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

    /**
     * @return int
     */
    public function getActualPeoplesCount(): int
    {
        return $this->actualPeoplesCount;
    }

    /**
     * @param int $actualPeoplesCount
     * @return Apartment
     */
    public function setActualPeoplesCount(int $actualPeoplesCount): Apartment
    {
        $this->actualPeoplesCount = $actualPeoplesCount;
        return $this;
    }
}
