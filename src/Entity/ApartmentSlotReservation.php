<?php

namespace App\Entity;

use App\Entity\Base\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("apartments_slot_reservations")
 * @ORM\Entity(repositoryClass="App\Repository\ApartmentSlotReservationRepository")
 */
class ApartmentSlotReservation extends AbstractEntity
{
    /**
     * @var \DateTime
     * @ORM\Column(name="reservation_start", type="date", nullable=true)
     */
    protected $reservationStart;

    /**
     * @var \DateTime
     * @ORM\Column(name="reservation_end", type="date", nullable=true)
     */
    protected $reservationEnd;

    /**
     * @ORM\Column(name="reservation_days", type="integer", options={"default":0})
     */
    protected $reservationDays = 0;

    /**
     * @var float
     * @ORM\Column(name="payment_without_discount", type="decimal", precision=7, scale=2, options={"default":0.00})
     */
    protected $paymentWithoutDiscount = 0.00;

    /**
     * @var float
     * @ORM\Column(name="payment_with_discount", type="decimal", precision=7, scale=2, options={"default":0.00})
     */
    protected $paymentWithDiscount = 0.00;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\ApartmentSlot", inversedBy="reservations")
     * @ORM\JoinColumn(name="apartment_slot_id", referencedColumnName="id")
     */
    protected $slot;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ApartmentSlot", inversedBy="reservations")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    public function __construct()
    {
        if (!$this->id) {
            $this->createdAt = new \DateTime();
        }
    }

    public function getReservationStart(): ?\DateTimeInterface
    {
        return $this->reservationStart;
    }

    public function setReservationStart(?\DateTimeInterface $reservationStart): self
    {
        $this->reservationStart = $reservationStart;

        return $this;
    }

    public function getReservationEnd(): ?\DateTimeInterface
    {
        return $this->reservationEnd;
    }

    public function setReservationEnd(?\DateTimeInterface $reservationEnd): self
    {
        $this->reservationEnd = $reservationEnd;

        return $this;
    }

    public function getReservationDays(): ?int
    {
        return $this->reservationDays;
    }

    public function setReservationDays(int $reservationDays): self
    {
        $this->reservationDays = $reservationDays;

        return $this;
    }

    public function getPaymentWithoutDiscount(): ?string
    {
        return $this->paymentWithoutDiscount;
    }

    public function setPaymentWithoutDiscount(string $paymentWithoutDiscount): self
    {
        $this->paymentWithoutDiscount = $paymentWithoutDiscount;

        return $this;
    }

    public function getPaymentWithDiscount(): ?string
    {
        return $this->paymentWithDiscount;
    }

    public function setPaymentWithDiscount(string $paymentWithDiscount): self
    {
        $this->paymentWithDiscount = $paymentWithDiscount;

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

    public function getSlot(): ?ApartmentSlot
    {
        return $this->slot;
    }

    public function setSlot(?ApartmentSlot $slot): self
    {
        $this->slot = $slot;

        return $this;
    }

    public function getUser(): ?ApartmentSlot
    {
        return $this->user;
    }

    public function setUser(?ApartmentSlot $user): self
    {
        $this->user = $user;

        return $this;
    }
}
