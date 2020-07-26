<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AddressRepository::class)
 */
class Address
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $floor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $way;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $postCode;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $country;

    /**
     * @ORM\OneToOne(targetEntity=Company::class, mappedBy="address", cascade={"persist", "remove"})
     */
    private $company;

    /**
     * @ORM\OneToOne(targetEntity=Contact::class, mappedBy="address", cascade={"persist", "remove"})
     */
    private $contact;

    /**
     * @ORM\OneToOne(targetEntity=JobInterview::class, mappedBy="adress", cascade={"persist", "remove"})
     */
    private $jobInerview;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function setFloor(?int $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getWay(): ?string
    {
        return $this->way;
    }

    public function setWay(?string $way): self
    {
        $this->way = $way;

        return $this;
    }

    public function getPostCode(): ?int
    {
        return $this->postCode;
    }

    public function setPostCode(?int $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        // set (or unset) the owning side of the relation if necessary
        $newAddress = null === $company ? null : $this;
        if ($company->getAddress() !== $newAddress) {
            $company->setAddress($newAddress);
        }

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        // set (or unset) the owning side of the relation if necessary
        $newAddress = null === $contact ? null : $this;
        if ($contact->getAddress() !== $newAddress) {
            $contact->setAddress($newAddress);
        }

        return $this;
    }

    public function getJobInerview(): ?JobInterview
    {
        return $this->jobInerview;
    }

    public function setJobInerview(?JobInterview $jobInerview): self
    {
        $this->jobInerview = $jobInerview;

        // set (or unset) the owning side of the relation if necessary
        $newAdress = null === $jobInerview ? null : $this;
        if ($jobInerview->getAdress() !== $newAdress) {
            $jobInerview->setAdress($newAdress);
        }

        return $this;
    }
}
