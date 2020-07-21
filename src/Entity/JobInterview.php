<?php

namespace App\Entity;

use App\Repository\JobInterviewRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobInterviewRepository::class)
 */
class JobInterview
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateOfInterview;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $schedule;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Address;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $contactForName;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $contactSirName;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $contactTitle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOfInterview(): ?\DateTimeInterface
    {
        return $this->dateOfInterview;
    }

    public function setDateOfInterview(?\DateTimeInterface $dateOfInterview): self
    {
        $this->dateOfInterview = $dateOfInterview;

        return $this;
    }

    public function getSchedule(): ?\DateTimeInterface
    {
        return $this->schedule;
    }

    public function setSchedule(?\DateTimeInterface $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(?string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getContactForName(): ?string
    {
        return $this->contactForName;
    }

    public function setContactForName(?string $contactForName): self
    {
        $this->contactForName = $contactForName;

        return $this;
    }

    public function getContactSirName(): ?string
    {
        return $this->contactSirName;
    }

    public function setContactSirName(?string $contactSirName): self
    {
        $this->contactSirName = $contactSirName;

        return $this;
    }

    public function getContactTitle(): ?string
    {
        return $this->contactTitle;
    }

    public function setContactTitle(?string $contactTitle): self
    {
        $this->contactTitle = $contactTitle;

        return $this;
    }
}
