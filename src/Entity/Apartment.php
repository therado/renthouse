<?php

namespace App\Entity;

use App\Repository\ApartmentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApartmentRepository::class)]
class Apartment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 1024)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    private ?string $imageFilename1 = null;

    #[ORM\Column(length: 255)]
    private ?string $imageFilename2 = null;

    #[ORM\Column(length: 255)]
    private ?string $imageFilename3 = null;

    #[ORM\Column(length: 255)]
    private ?string $imageFilename4 = null;

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
}
