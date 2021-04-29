<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


/**
 * @ORM\Entity(repositoryClass=UserRepository::class)

 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"emailadresse"},
 * message="Already used")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $username;

    /**

     * @ORM\Column(type="string", length=30, nullable=true)

     * @Assert\Length(min="8",minMessage="your password must be at least 8 characters long")
     * @Assert\EqualTo(propertyPath="confirm_password",message="
    you did not type the same password")
     */

    private $password;
    /**

     * @Assert\EqualTo(propertyPath="password",message="
    you did not type the same password")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
   public $s_ques;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $answer;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     * @Assert\Email (
     *     message = "The emailadresse '{{ value }}' is not a valid emailadresse."
     * )

     */

    private $emailadresse;

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSQues(): ?string
    {
        return $this->s_ques;
    }

    public function setSQues(?string $s_ques): self
    {
        $this->s_ques = $s_ques;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(?string $answer): self
    {
        $this->answer = $answer;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEmailadresse(): ?string
    {
        return $this->emailadresse;
    }

    public function setEmailadresse(?string $emailadresse): self
    {
        $this->emailadresse = $emailadresse;

        return $this;
    }
}
