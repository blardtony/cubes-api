<?php

namespace App\Entity;

use App\Repository\SynopsisRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SynopsisRepository::class)
 */
class Synopsis extends Ressource
{


    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"ressource:get"})
     */
    private $authorBook;

    /**
     * @ORM\Column(type="date_immutable")
     * @Groups({"ressource:get"})
     */
    private $birthdayAuthor;

    /**
     * @ORM\Column(type="date_immutable", nullable=true)
     * @Groups({"ressource:get"})
     */
    private $deathAuthor;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"ressource:get"})
     */
    private $literaryMovement;

    /**
     * @ORM\Column(type="date_immutable")
     * @Groups({"ressource:get"})
     */
    private $publishDate;



    /**
     * @ORM\Column(type="text")
     * @Groups({"ressource:get"})
     */
    private $content;

    /**
     * @ORM\Column(type="text")
     * @Groups({"ressource:get"})
     */
    private $opinion;



    public function getAuthorBook(): ?string
    {
        return $this->authorBook;
    }

    public function setAuthorBook(string $authorBook): self
    {
        $this->authorBook = $authorBook;

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
