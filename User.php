<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D93D649F85E0677", columns={"username"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=180, nullable=true)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="roles", type="string", length=10, nullable=true)
     */
    private $roles;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="birth_date", type="string", length=12, nullable=true)
     */
    private $birthDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="speciality", type="string", length=255, nullable=true)
     */
    private $speciality;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="experience", type="string", length=255, nullable=true)
     */
    private $experience;

    /**
     * @var int|null
     *
     * @ORM\Column(name="hight", type="integer", nullable=true)
     */
    private $hight;

    /**
     * @var int|null
     *
     * @ORM\Column(name="weight", type="integer", nullable=true)
     */
    private $weight;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cv", type="string", length=255, nullable=true)
     */
    private $cv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="media", type="string", length=255, nullable=true)
     */
    private $media;

    /**
     * @var string|null
     *
     * @ORM\Column(name="company", type="string", length=255, nullable=true)
     */
    private $company;

    /**
     * @var string|null
     *
     * @ORM\Column(name="position", type="string", length=255, nullable=true)
     */
    private $position;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pays_natals", type="string", length=30, nullable=true)
     */
    private $paysNatals;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sexe", type="string", length=30, nullable=true)
     */
    private $sexe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lien_profil_pic", type="string", length=100, nullable=true)
     */
    private $lienProfilPic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sponsorship", type="string", length=30, nullable=true)
     */
    private $sponsorship;

    /**
     * @var int|null
     *
     * @ORM\Column(name="solde", type="integer", nullable=true)
     */
    private $solde;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string|null
     */
    public function getRoles(): ?string
    {
        return $this->roles;
    }

    /**
     * @param string|null $roles
     */
    public function setRoles(?string $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string|null
     */
    public function getBirthDate(): ?string
    {
        return $this->birthDate;
    }

    /**
     * @param string|null $birthDate
     */
    public function setBirthDate(?string $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return string|null
     */
    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    /**
     * @param string|null $speciality
     */
    public function setSpeciality(?string $speciality): void
    {
        $this->speciality = $speciality;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     */
    public function getExperience(): ?string
    {
        return $this->experience;
    }

    /**
     * @param string|null $experience
     */
    public function setExperience(?string $experience): void
    {
        $this->experience = $experience;
    }

    /**
     * @return int|null
     */
    public function getHight(): ?int
    {
        return $this->hight;
    }

    /**
     * @param int|null $hight
     */
    public function setHight(?int $hight): void
    {
        $this->hight = $hight;
    }

    /**
     * @return int|null
     */
    public function getWeight(): ?int
    {
        return $this->weight;
    }

    /**
     * @param int|null $weight
     */
    public function setWeight(?int $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return string|null
     */
    public function getCv(): ?string
    {
        return $this->cv;
    }

    /**
     * @param string|null $cv
     */
    public function setCv(?string $cv): void
    {
        $this->cv = $cv;
    }

    /**
     * @return string|null
     */
    public function getMedia(): ?string
    {
        return $this->media;
    }

    /**
     * @param string|null $media
     */
    public function setMedia(?string $media): void
    {
        $this->media = $media;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param string|null $company
     */
    public function setCompany(?string $company): void
    {
        $this->company = $company;
    }

    /**
     * @return string|null
     */
    public function getPosition(): ?string
    {
        return $this->position;
    }

    /**
     * @param string|null $position
     */
    public function setPosition(?string $position): void
    {
        $this->position = $position;
    }

    /**
     * @return string|null
     */
    public function getPaysNatals(): ?string
    {
        return $this->paysNatals;
    }

    /**
     * @param string|null $paysNatals
     */
    public function setPaysNatals(?string $paysNatals): void
    {
        $this->paysNatals = $paysNatals;
    }

    /**
     * @return string|null
     */
    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    /**
     * @param string|null $sexe
     */
    public function setSexe(?string $sexe): void
    {
        $this->sexe = $sexe;
    }

    /**
     * @return string|null
     */
    public function getLienProfilPic(): ?string
    {
        return $this->lienProfilPic;
    }

    /**
     * @param string|null $lienProfilPic
     */
    public function setLienProfilPic(?string $lienProfilPic): void
    {
        $this->lienProfilPic = $lienProfilPic;
    }

    /**
     * @return string|null
     */
    public function getSponsorship(): ?string
    {
        return $this->sponsorship;
    }

    /**
     * @param string|null $sponsorship
     */
    public function setSponsorship(?string $sponsorship): void
    {
        $this->sponsorship = $sponsorship;
    }

    /**
     * @return int|null
     */
    public function getSolde(): ?int
    {
        return $this->solde;
    }

    /**
     * @param int|null $solde
     */
    public function setSolde(?int $solde): void
    {
        $this->solde = $solde;
    }


}
