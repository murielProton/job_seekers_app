<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $forName;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $sirName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $eMail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\OneToOne(targetEntity=Application::class, mappedBy="contact", cascade={"persist", "remove"})
     */
    private $application;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getForName(): ?string
    {
        return $this->forName;
    }

    public function setForName(?string $forName): self
    {
        $this->forName = $forName;

        return $this;
    }

    public function getSirName(): ?string
    {
        return $this->sirName;
    }

    public function setSirName(?string $sirName): self
    {
        $this->sirName = $sirName;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEMail(): ?string
    {
        return $this->eMail;
    }

    public function setEMail(?string $eMail): self
    {
        $this->eMail = $eMail;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getApplication(): ?Application
    {
        return $this->application;
    }

    public function setApplication(?Application $application): self
    {
        $this->application = $application;

        return $this;
    }

    public function __toString()
    {
        return $this->forName;
    }
}
