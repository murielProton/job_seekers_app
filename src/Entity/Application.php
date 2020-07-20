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
     * @ORM\Column(type="object", nullable=true)
     */
    private $answer;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $unsolicited;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $jobInterview;

    /**
     * @ORM\OneToOne(targetEntity=Contact::class, inversedBy="application", cascade={"persist", "remove"})
     */
    private $contact;

    public function __construct()
    {
        $this->contact = new Contact();
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

    public function getAnswer()
    {
        return $this->answer;
    }

    public function setAnswer($answer): self
    {
        $this->answer = $answer;

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

    public function getJobInterview()
    {
        return $this->jobInterview;
    }

    public function setJobInterview($jobInterview): self
    {
        $this->jobInterview = $jobInterview;

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
}
