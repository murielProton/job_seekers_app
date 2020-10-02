<?php

namespace App\Entity;

use App\Repository\ExchangeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExangeRepository::class)
 */
class Exchange
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $schedule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $means;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getMeans(): ?string
    {
        return $this->means;
    }

    public function setMeans(string $means): self
    {
        $this->means = $means;

        return $this;
    }


    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }
}
