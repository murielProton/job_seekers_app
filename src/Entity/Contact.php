<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $contactTitle;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $forName;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $sirName;

    /**
     * @ORM\Column(type="integer", length=14, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=320, nullable=true)
     */
    private $eMail;

    /**
     * @ORM\ManyToOne(targetEntity=Answer::class, inversedBy="contact")
     */
    private $answer;

    /**
     * @ORM\ManyToOne(targetEntity=Application::class, inversedBy="contact")
     */
    private $application;

    /**
     * @ORM\ManyToMany(targetEntity=Company::class, mappedBy="contact")
     */
    private $companies;

    /**
     * @ORM\OneToOne(targetEntity=Address::class, inversedBy="contact", cascade={"persist", "remove"})
     */
    private $address;

    public function __construct()
    {
        $this->companies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getForName(): ?string
    {
        return $this->forName;
    }

    public function setForName(?string $forName): self
    {
        $this->forName = $forName;

        return $this;
    }

    public function getSirName(): ?string
    {
        return $this->sirName;
    }

    public function setSirName(?string $sirName): self
    {
        $this->sirName = $sirName;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEMail(): ?string
    {
        return $this->eMail;
    }

    public function setEMail(?string $eMail): self
    {
        $this->eMail = $eMail;

        return $this;
    }

    public function getAnswer(): ?Answer
    {
        return $this->answer;
    }

    public function setAnswer(?Answer $answer): self
    {
        $this->answer = $answer;

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
     * @return Collection|Company[]
     */
    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(Company $company): self
    {
        if (!$this->companies->contains($company)) {
            $this->companies[] = $company;
            $company->addContact($this);
        }

        return $this;
    }

    public function removeCompany(Company $company): self
    {
        if ($this->companies->contains($company)) {
            $this->companies->removeElement($company);
            $company->removeContact($this);
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
}
