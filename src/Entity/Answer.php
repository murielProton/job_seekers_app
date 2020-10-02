<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Answer
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
    private $date;


    /**
     * @ORM\Column(type="string", length=1200, nullable=true)
     */
    private $textOfAnswer;

    /**
     * @ORM\Column(type="text", length=1200, nullable=true)
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity=Contact::class, mappedBy="answer")
     */
    private $contact;

    /**
     * @ORM\OneToOne(targetEntity=JobInterview::class, inversedBy="answer", cascade={"persist", "remove"})
     */
    private $jobInterview;

    /**
     * @ORM\ManyToOne(targetEntity=Application::class, inversedBy="answer")
     */
    private $application;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $means;

    public function __construct()
    {
        $this->contact = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTextOfAnswer(): ?string
    {
        return $this->textOfAnswer;
    }

    public function setTextOfAnswer(?string $textOfAnswer): self
    {
        $this->textOfAnswer = $textOfAnswer;

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
            $contact->setAnswer($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        if ($this->contact->contains($contact)) {
            $this->contact->removeElement($contact);
            // set the owning side to null (unless already changed)
            if ($contact->getAnswer() === $this) {
                $contact->setAnswer(null);
            }
        }

        return $this;
    }

    public function getJobInterview(): ?JobInterview
    {
        return $this->jobInterview;
    }

    public function setJobInterview(?JobInterview $jobInterview): self
    {
        $this->jobInterview = $jobInterview;

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
        return $this->textOfAnswer;
    }

    public function getMeans(): ?string
    {
        return $this->means;
    }

    public function setMeans(?string $means): self
    {
        $this->means = $means;

        return $this;
    }
}
