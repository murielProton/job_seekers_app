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
    private $comments;

    /**
     * @ORM\OneToOne(targetEntity=Answer::class, mappedBy="jobInterview", cascade={"persist", "remove"})
     */
    private $answer;

    /**
     * @ORM\OneToOne(targetEntity=Address::class, inversedBy="jobInerview", cascade={"persist", "remove"})
     */
    private $adress;

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

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getAnswer(): ?Answer
    {
        return $this->answer;
    }

    public function setAnswer(?Answer $answer): self
    {
        $this->answer = $answer;

        // set (or unset) the owning side of the relation if necessary
        $newJobInterview = null === $answer ? null : $this;
        if ($answer->getJobInterview() !== $newJobInterview) {
            $answer->setJobInterview($newJobInterview);
        }

        return $this;
    }

    public function getAdress(): ?Address
    {
        return $this->adress;
    }

    public function setAdress(?Address $adress): self
    {
        $this->adress = $adress;

        return $this;
    }
}
