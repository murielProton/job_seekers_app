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
     * @ORM\Column(type="date", nullable=false)
     */
    private $dateOfInterview;

    /**
     * @ORM\Column(type="time", nullable=false)
     */
    private $schedule;

    /**
     * @ORM\Column(type="text", length=1200, nullable=true)
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

    /**
     * @ORM\OneToOne(targetEntity=Company::class, inversedBy="jobInterview", cascade={"persist", "remove"})
     */
    private $company;

    /**
     * @ORM\ManyToOne(targetEntity=Application::class, inversedBy="jobInterviews")
     */
    private $application;

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

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

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
}
