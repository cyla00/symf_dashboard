<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="books")
     */
    private $owner;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $writtingDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $editionDAte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getOwner(): ?user
    {
        return $this->owner;
    }

    public function setOwner(?user $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getWrittingDate(): ?\DateTimeInterface
    {
        return $this->writtingDate;
    }

    public function setWrittingDate(?\DateTimeInterface $writtingDate): self
    {
        $this->writtingDate = $writtingDate;

        return $this;
    }

    public function getEditionDAte(): ?\DateTimeInterface
    {
        return $this->editionDAte;
    }

    public function setEditionDAte(?\DateTimeInterface $editionDAte): self
    {
        $this->editionDAte = $editionDAte;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
