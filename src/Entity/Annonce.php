<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Persistence\ObjectManager;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 * @Vich\Uploadable
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 10,
     *      max = 50,
     *      minMessage = "Le titre doit contenir au minimum {{ limit }} caractères",
     *      maxMessage = "Le titre doit contenir au maximum {{ limit }} caractères"
     * )
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string | null
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="annonce_image", fileNameProperty="image")
     * @var File | null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="date")
     */
    private $dateajout;

    public function __construct()
    {
        $this->dateajout= new \DateTime();
        $this->datemodif= new \DateTime();
    }

    /**
     * @ORM\Column(type="date")
     */
    private $datemodif;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idUser;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        $this->datemodif = new \DateTime('now');

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;
        $this->datemodif = new \DateTime('now');

        return $this;
    }



    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     * @return Annonce
     */
    public function setImage(?string $image): Annonce
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|null $imageFile
     * @return Annonce
     */
    public function setImageFile(?File $imageFile): Annonce
    {
        $this->imageFile = $imageFile;
        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($imageFile) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->datemodif = new \DateTime('now');
        }
        return $this;
    }



    public function getDateajout(): ?\DateTimeInterface
    {
        return $this->dateajout;
    }

    public function setDateajout(\DateTimeInterface $dateajout): self
    {
        $this->dateajout = $dateajout;

        return $this;
    }

    public function getDatemodif(): ?\DateTimeInterface
    {
        return $this->datemodif;
    }

    public function setDatemodif(\DateTimeInterface $datemodif): self
    {
        $this->datemodif = $datemodif;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(?int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}
