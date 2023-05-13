<?php

namespace App\Entity;

use App\Repository\ApartamentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApartamentRepository::class)]
class Apartament
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?bool $availability = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $bookableFrom = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $bookableTo = null;

    #[ORM\Column(length: 255)]
    private ?string $imageFilename1 = null;

    #[ORM\Column(length: 255)]
    private ?string $imageFilename2 = null;

    #[ORM\Column(length: 255)]
    private ?string $imageFilename3 = null;

    #[ORM\Column(length: 255)]
    private ?string $imageFilename4 = null;

    #[ORM\Column(length: 255)]
    private ?string $imageFilename5 = null;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function isAvailability(): ?bool
    {
        return $this->availability;
    }

    public function setAvailability(bool $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    public function getBookableFrom(): ?\DateTimeInterface
    {
        return $this->bookableFrom;
    }

    public function setBookableFrom(\DateTimeInterface $bookableFrom): self
    {
        $this->bookableFrom = $bookableFrom;

        return $this;
    }

    public function getBookableTo(): ?\DateTimeInterface
    {
        return $this->bookableTo;
    }

    public function setBookableTo(\DateTimeInterface $bookableTo): self
    {
        $this->bookableTo = $bookableTo;

        return $this;
    }

    public function getImageFilename1(): ?string
    {
        return $this->imageFilename1;
    }

    public function setImageFilename1(string $imageFilename1): self
    {
        $this->imageFilename1 = $imageFilename1;

        return $this;
    }

    public function getImageFilename2(): ?string
    {
        return $this->imageFilename2;
    }

    public function setImageFilename2(string $imageFilename2): self
    {
        $this->imageFilename2 = $imageFilename2;

        return $this;
    }

    public function getImageFilename3(): ?string
    {
        return $this->imageFilename3;
    }

    public function setImageFilename3(string $imageFilename3): self
    {
        $this->imageFilename3 = $imageFilename3;

        return $this;
    }

    public function getImageFilename4(): ?string
    {
        return $this->imageFilename4;
    }

    public function setImageFilename4(string $imageFilename4): self
    {
        $this->imageFilename4 = $imageFilename4;

        return $this;
    }

    public function getImageFilename5(): ?string
    {
        return $this->imageFilename5;
    }

    public function setImageFilename5(string $imageFilename5): self
    {
        $this->imageFilename5 = $imageFilename5;

        return $this;
    }
}
