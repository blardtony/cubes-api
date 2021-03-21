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
}
