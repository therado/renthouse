<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'reservation', targetEntity: Apartament::class)]
    private Collection $apartament;

    #[ORM\OneToMany(mappedBy: 'reservations', targetEntity: User::class)]
    private Collection $customer;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    public function __construct()
    {
        $this->apartament = new ArrayCollection();
        $this->customer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Apartament>
     */
    public function getApartament(): Collection
    {
        return $this->apartament;
    }

    public function addApartament(Apartament $apartament): self
    {
        if (!$this->apartament->contains($apartament)) {
            $this->apartament->add($apartament);
            $apartament->setReservation($this);
        }

        return $this;
    }

    public function removeApartament(Apartament $apartament): self
    {
        if ($this->apartament->removeElement($apartament)) {
            // set the owning side to null (unless already changed)
            if ($apartament->getReservation() === $this) {
                $apartament->setReservation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getCustomer(): Collection
    {
        return $this->customer;
    }

    public function addCustomer(User $customer): self
    {
        if (!$this->customer->contains($customer)) {
            $this->customer->add($customer);
            $customer->setReservations($this);
        }

        return $this;
    }

    public function removeCustomer(User $customer): self
    {
        if ($this->customer->removeElement($customer)) {
            // set the owning side to null (unless already changed)
            if ($customer->getReservations() === $this) {
                $customer->setReservations(null);
            }
        }

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }
}
