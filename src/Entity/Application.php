<?php

namespace App\Entity;

use App\Repository\ApplicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=ApplicationRepository::class)
 */
class Application
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $webSiteName;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $companyName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $jobAdvertisement;

    /**
     * @ORM\Column(type="date")
     */
    private $postingDate;

    /**
     * @ORM\Column(type="date")
     */
    private $folowUpDate;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $unsolicited;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;


    /**
     * @ORM\OneToOne(targetEntity=Contact::class, inversedBy="application", cascade={"persist", "remove"})
     */
    private $contact;

    /**
     * @ORM\OneToMany(targetEntity=JobInterview::class, mappedBy="application")
     */
    private $JobInterview;

    /**
     * @ORM\OneToMany(targetEntity=Answer::class, mappedBy="application")
     */
    private $answer;

    public function __construct()
    {
        $this->contact = new Contact();
        $this->JobInterview = new ArrayCollection();
        $this->answer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWebSiteName(): ?string
    {
        return $this->webSiteName;
    }

    public function setWebSiteName(?string $webSiteName): self
    {
        $this->webSiteName = $webSiteName;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getJobAdvertisement(): ?string
    {
        return $this->jobAdvertisement;
    }

    public function setJobAdvertisement(?string $jobAdvertisement): self
    {
        $this->jobAdvertisement = $jobAdvertisement;

        return $this;
    }

    public function getPostingDate(): ?\DateTimeInterface
    {
        return $this->postingDate;
    }

    public function setPostingDate(\DateTimeInterface $postingDate): self
    {
       // $postingDate=date('H:m:s j, F, Y');
        $this->postingDate = $postingDate;

        return $this;
    }

    public function getFolowUpDate(): ?\DateTimeInterface
    {
        return $this->folowUpDate;
    }

    public function setFolowUpDate(\DateTimeInterface $folowUpDate): self
    {
        $this->folowUpDate = $folowUpDate;

        return $this;
    }

    public function getUnsolicited(): ?bool
    {
        return $this->unsolicited;
    }

    public function setUnsolicited(?bool $unsolicited): self
    {
        $this->unsolicited = $unsolicited;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Collection|JobInterview[]
     */
    public function getJobInterview(): Collection
    {
        return $this->JobInterview;
    }

    public function addJobInterview(JobInterview $jobInterview): self
    {
        if (!$this->JobInterview->contains($jobInterview)) {
            $this->JobInterview[] = $jobInterview;
            $jobInterview->setApplication($this);
        }

        return $this;
    }

    public function removeJobInterview(JobInterview $jobInterview): self
    {
        if ($this->JobInterview->contains($jobInterview)) {
            $this->JobInterview->removeElement($jobInterview);
            // set the owning side to null (unless already changed)
            if ($jobInterview->getApplication() === $this) {
                $jobInterview->setApplication(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Answer[]
     */
    public function getAnswer(): Collection
    {
        return $this->answer;
    }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answer->contains($answer)) {
            $this->answer[] = $answer;
            $answer->setApplication($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answer->contains($answer)) {
            $this->answer->removeElement($answer);
            // set the owning side to null (unless already changed)
            if ($answer->getApplication() === $this) {
                $answer->setApplication(null);
            }
        }

        return $this;
    }
}
