<?php

namespace App\Entity;

use App\Entity\Base\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table("apartments_reservations")
 * @ORM\Entity(repositoryClass="App\Repository\ApartmentReservationRepository")
 */
class ApartmentReservation extends AbstractEntity
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
     * @var integer
     * @ORM\Column(name="reservation_days", type="integer", options={"default":1})
     */
    protected $reservationDays = 1;

    /**
     * @var integer
     * @ORM\Column(name="peoples_number", type="integer", options={"default":1})
     */
    protected $peoplesNumber = 1;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Apartment", inversedBy="reservations", cascade={"persist"})
     * @ORM\JoinColumn(name="apartment_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $apartment;

    /**
     * @var UserInterface|null
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="reservations", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $user;

    /** @var string|null */
    protected $errorMessage = null;

    public function __construct()
    {
        if (!$this->id) {
            $this->createdAt = new \DateTime();
        }
    }

    public function toArray(): array
    {
        return [
            'reservationStart' => $this->getReservationStart() ? $this->getReservationStart()->format('Y-m-d') : null,
            'reservationEnd' => $this->getReservationEnd() ? $this->getReservationEnd()->format('Y-m-d') : null,
            'reservationDays' => $this->getReservationDays(),
            'paymentWithoutDiscount' => number_format($this->getPaymentWithoutDiscount(), 2, '.', ''),
            'paymentWithDiscount' => number_format($this->getPaymentWithDiscount(), 2, '.', ''),
            'errorMessage' => $this->getErrorMessage()
        ];
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

    public function getApartment(): ?Apartment
    {
        return $this->apartment;
    }

    public function setApartment(?Apartment $apartment): self
    {
        $this->apartment = $apartment;

        return $this;
    }

    public function getUser(): ?UserInterface
    {
        return $this->user;
    }

    public function setUser(?UserInterface $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPeoplesNumber(): ?int
    {
        return $this->peoplesNumber;
    }

    public function setPeoplesNumber(int $peoplesNumber): self
    {
        $this->peoplesNumber = $peoplesNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     * @return ApartmentReservation
     */
    public function setErrorMessage(?string $errorMessage): ApartmentReservation
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }
}
