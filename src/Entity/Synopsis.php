<?php

namespace App\Entity;

use App\Repository\SynopsisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SynopsisRepository::class)
 */
class Synopsis extends Ressource
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
    private $author;

    /**
     * @ORM\Column(type="date_immutable")
     */
    private $birthdayAuthor;

    /**
     * @ORM\Column(type="date_immutable", nullable=true)
     */
    private $deathAuthor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $literaryMovement;

    /**
     * @ORM\Column(type="date_immutable")
     */
    private $publishDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="text")
     */
    private $opinion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getBirthdayAuthor(): ?\DateTimeImmutable
    {
        return $this->birthdayAuthor;
    }

    public function setBirthdayAuthor(\DateTimeImmutable $birthdayAuthor): self
    {
        $this->birthdayAuthor = $birthdayAuthor;

        return $this;
    }

    public function getDeathAuthor(): ?\DateTimeImmutable
    {
        return $this->deathAuthor;
    }

    public function setDeathAuthor(?\DateTimeImmutable $deathAuthor): self
    {
        $this->deathAuthor = $deathAuthor;

        return $this;
    }

    public function getLiteraryMovement(): ?string
    {
        return $this->literaryMovement;
    }

    public function setLiteraryMovement(string $literaryMovement): self
    {
        $this->literaryMovement = $literaryMovement;

        return $this;
    }

    public function getPublishDate(): ?\DateTimeImmutable
    {
        return $this->publishDate;
    }

    public function setPublishDate(\DateTimeImmutable $publishDate): self
    {
        $this->publishDate = $publishDate;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getOpinion(): ?string
    {
        return $this->opinion;
    }

    public function setOpinion(string $opinion): self
    {
        $this->opinion = $opinion;

        return $this;
    }
}
