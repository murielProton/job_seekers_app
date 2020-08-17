<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $companyName;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $companyWEBSite;

    /**
     * @ORM\Column(type="string", length=1200, nullable=true)
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity=Application::class, mappedBy="company", cascade={"persist", "remove"})
     */
    private $application;

    /**
     * @ORM\OneToOne(targetEntity=Address::class, inversedBy="company", cascade={"persist", "remove"})
     */
    private $address;
    
    /**
     * @ORM\OneToOne(targetEntity=JobInterview::class, mappedBy="company", cascade={"persist", "remove"})
     */
    private $jobInterview;

    /**
     * @ORM\ManyToMany(targetEntity=Contact::class, mappedBy="companies")
     */
    private $contacts;

    public function __construct()
    {
        $this->application = new ArrayCollection();
        $this->contacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getCompanyWEBSite(): ?string
    {
        return $this->companyWEBSite;
    }

    public function setCompanyWEBSite(string $companyWEBSite): self
    {
        $this->companyWEBSite = $companyWEBSite;

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
     * @return Collection|Application[]
     */
    public function getApplication(): Collection
    {
        return $this->application;
    }

    public function addApplication(Application $application): self
    {
        if (!$this->application->contains($application)) {
            $this->application[] = $application;
            $application->setCompany($this);
        }

        return $this;
    }

    public function removeApplication(Application $application): self
    {
        if ($this->application->contains($application)) {
            $this->application->removeElement($application);
            // set the owning side to null (unless already changed)
            if ($application->getCompany() === $this) {
                $application->setCompany(null);
            }
        }

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getJobInterview(): ?JobInterview
    {
        return $this->jobInterview;
    }

    public function setJobInterview(?JobInterview $jobInterview): self
    {
        $this->jobInterview = $jobInterview;

        // set (or unset) the owning side of the relation if necessary
        $newCompany = null === $jobInterview ? null : $this;
        if ($jobInterview->getCompany() !== $newCompany) {
            $jobInterview->setCompany($newCompany);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->companyName;
    }

    /**
     * @return Collection|Contact[]
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->addCompany($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        if ($this->contacts->contains($contact)) {
            $this->contacts->removeElement($contact);
            $contact->removeCompany($this);
        }

        return $this;
    }
}
