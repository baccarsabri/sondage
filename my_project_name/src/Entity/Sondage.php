<?php

namespace App\Entity;

use App\Repository\SondageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SondageRepository::class)
 */
class Sondage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $np_participant;

    /**
     * @ORM\Column(type="integer")
     */
    private $np_reponse;

    

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

        return $this;
    }

    public function getNpParticipant(): ?int
    {
        return $this->np_participant;
    }

    public function setNpParticipant(?int $np_participant): self
    {
        $this->np_participant = $np_participant;

        return $this;
    }

    public function getNpReponse(): ?int
    {
        return $this->np_reponse;
    }

    public function setNpReponse(int $np_reponse): self
    {
        $this->np_reponse = $np_reponse;

        return $this;
    }

    

   


}
