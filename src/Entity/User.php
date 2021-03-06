<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $userName;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $eMail;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $currentWorkTitle;

    /**
     * @ORM\Column(type="array", length=20)
     */
    private $targetedWorkTitle = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $whereOu = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?int $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getCurrentWorkTitle(): ?string
    {
        return $this->currentWorkTitle;
    }

    public function setCurrentWorkTitle(?string $currentWorkTitle): self
    {
        $this->currentWorkTitle = $currentWorkTitle;

        return $this;
    }

    public function getTargetedWorkTitle(): ?array
    {
        return $this->targetedWorkTitle;
    }

    public function setTargetedWorkTitle(?array $targetedWorkTitle): self
    {
        $this->targetedWorkTitle = $targetedWorkTitle;

        return $this;
    }

    public function getWhereOu(): ?array
    {
        return $this->whereOu;
    }

    public function setWhereOu(?array $whereOu): self
    {
        $this->whereOu = $whereOu;

        return $this;
    }
}
