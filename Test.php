<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $mail_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMailId(): ?int
    {
        return $this->mail_id;
    }

    public function setMailId(int $mail_id): self
    {
        $this->mail_id = $mail_id;

        return $this;
    }
}
