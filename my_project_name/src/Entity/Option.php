<?php

namespace App\Entity;

use App\Repository\OptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OptionRepository::class)
 * @ORM\Table(name="`option`")
 */
class Option
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=question::class, inversedBy="options" ,cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $opt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text_option;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpt(): ?question
    {
        return $this->opt;
    }

    public function setOpt(?question $opt): self
    {
        $this->opt = $opt;

        return $this;
    }

    public function getTextOption(): ?string
    {
        return $this->text_option;
    }

    public function setTextOption(string $text_option): self
    {
        $this->text_option = $text_option;

        return $this;
    }
    public function __toString() {
        return $this->text_option;
    }

}
