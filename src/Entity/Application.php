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
     * @ORM\Column(type="date", nullable=true)
     */
    private $postingDate;

    /**
     * @ORM\Column(type="string", length=20, nullable=False)
     */
    private $title;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $folowUpDate;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $addsWEBSite;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $jobAdvertisement;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $unsolicited;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="application", cascade={"persist", "remove"})
     */
    private $company;

    /**
     * @ORM\OneToMany(targetEntity=Contact::class, mappedBy="application")
     */
    private $contact;

    /**
     * @ORM\OneToMany(targetEntity=Answer::class, mappedBy="application")
     */
    private $answer;

    /**
     * @ORM\OneToMany(targetEntity=JobInterview::class, mappedBy="application")
     */
    private $jobInterviews;

    public function __construct()
    {
        $this->contact = new ArrayCollection();
        $this->answer = new ArrayCollection();
        $this->jobInterviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostingDate(): ?\DateTimeInterface
    {
        return $this->postingDate;
    }

    public function setPostingDate(?\DateTimeInterface $postingDate): self
    {
        $this->postingDate = $postingDate;

        return $this;
    }

    public function getFolowUpDate(): ?\DateTimeInterface
    {
        return $this->folowUpDate;
    }

    public function setFolowUpDate(?\DateTimeInterface $folowUpDate): self
    {
        $this->folowUpDate = $folowUpDate;

        return $this;
    }

    public function getAddsWEBSite(): ?string
    {
        return $this->addsWEBSite;
    }

    public function setAddsWEBSite(?string $addsWEBSite): self
    {
        $this->addsWEBSite = $addsWEBSite;

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

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

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

    /**
     * @return Collection|Contact[]
     */
    public function getContact(): Collection
    {
        return $this->contact;
    }

    public function addContact(Contact $contact): self
    {
        if (!$this->contact->contains($contact)) {
            $this->contact[] = $contact;
            $contact->setApplication($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        if ($this->contact->contains($contact)) {
            $this->contact->removeElement($contact);
            // set the owning side to null (unless already changed)
            if ($contact->getApplication() === $this) {
                $contact->setApplication(null);
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|JobInterview[]
     */
    public function getJobInterviews(): Collection
    {
        return $this->jobInterviews;
    }

    public function addJobInterview(JobInterview $jobInterview): self
    {
        if (!$this->jobInterviews->contains($jobInterview)) {
            $this->jobInterviews[] = $jobInterview;
            $jobInterview->setApplication($this);
        }

        return $this;
    }

    public function removeJobInterview(JobInterview $jobInterview): self
    {
        if ($this->jobInterviews->contains($jobInterview)) {
            $this->jobInterviews->removeElement($jobInterview);
            // set the owning side to null (unless already changed)
            if ($jobInterview->getApplication() === $this) {
                $jobInterview->setApplication(null);
            }
        }

        return $this;
    }
}
