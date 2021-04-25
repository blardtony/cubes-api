<?php

namespace App\Entity;

use App\Repository\RessourceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=RessourceRepository::class)
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *     "challenge" = "Challenge",
 *     "synopsis" = "Synopsis"
 * })
 */
abstract class Ressource
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"ressource:get"})
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"ressource:get"})
     */
    private $validate;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"ressource:get"})
     */
    private $title;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"ressource:get"})
     */
    private $suspend;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"ressource:get"})
     */
    private $share;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"ressource:get"})
     *
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=Citizen::class, inversedBy="ressources")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    public function __construct() {
        $this->validate = false;
        $this->suspend = false;
        $this->share=false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValidate(): ?bool
    {
        return $this->validate;
    }

    public function setValidate(bool $validate): self
    {
        $this->validate = $validate;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSuspend(): ?bool
    {
        return $this->suspend;
    }

    public function setSuspend(bool $suspend): self
    {
        $this->suspend = $suspend;

        return $this;
    }

    public function getShare(): ?bool
    {
        return $this->share;
    }

    public function setShare(bool $share): self
    {
        $this->share = $share;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getAuthor(): ?Citizen
    {
        return $this->author;
    }

    public function setAuthor(?Citizen $author): self
    {
        $this->author = $author;

        return $this;
    }
}
