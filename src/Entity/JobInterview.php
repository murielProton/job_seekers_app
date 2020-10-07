<?php

namespace App\Entity;

use App\Repository\JobInterviewRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToOne(targetEntity=Company::class, inversedBy="jobInterview", cascade={"persist", "remove"})
     */
    private $company;

    /**
     * @ORM\ManyToOne(targetEntity=Application::class, inversedBy="jobInterviews")
     */
    private $application;

    /**
     * @ORM\OneToMany(targetEntity=Exchange::class, mappedBy="jobInterview", cascade={"persist", "remove"})
     */
    private $exchange;

    public function __construct()
    {
        $this->exchange = new ArrayCollection();
    }

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

    /**
     * @return Collection|Exchange[]
     */
    public function getExchange(): Collection
    {
        return $this->exchange;
    }

    public function addExchange(Exchange $exchange): self
    {
        if (!$this->exchange->contains($exchange)) {
            $this->exchange[] = $exchange;
            $exchange->setJobInterview($this);
        }

        return $this;
    }

    public function removeExchange(Exchange $exchange): self
    {
        if ($this->exchange->contains($exchange)) {
            $this->exchange->removeElement($exchange);
            // set the owning side to null (unless already changed)
            if ($exchange->getJobInterview() === $this) {
                $exchange->setJobInterview(null);
            }
        }

        return $this;
    }
}
