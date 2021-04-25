<?php

namespace App\Entity;

use App\Repository\CitizenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CitizenRepository::class)
 */
class Citizen extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Ressource::class, mappedBy="author")
     */
    private $ressources;

    /**
     * @ORM\OneToMany(targetEntity=Aside::class, mappedBy="citizen")
     */
    private $asides;

    /**
     * @ORM\OneToMany(targetEntity=Favorites::class, mappedBy="citizen")
     */
    private $favorites;


    public function __construct()
    {
        $this->ressources = new ArrayCollection();
        $this->asides = new ArrayCollection();
        $this->favorites = new ArrayCollection();
        $this->setRoles(["ROLE_USER"]);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Ressource[]
     */
    public function getRessources(): Collection
    {
        return $this->ressources;
    }

    public function addRessource(Ressource $ressource): self
    {
        if (!$this->ressources->contains($ressource)) {
            $this->ressources[] = $ressource;
            $ressource->setAuthor($this);
        }

        return $this;
    }

    public function removeRessource(Ressource $ressource): self
    {
        if ($this->ressources->removeElement($ressource)) {
            // set the owning side to null (unless already changed)
            if ($ressource->getAuthor() === $this) {
                $ressource->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Aside[]
     */
    public function getAsides(): Collection
    {
        return $this->asides;
    }

    public function addAside(Aside $aside): self
    {
        if (!$this->asides->contains($aside)) {
            $this->asides[] = $aside;
            $aside->setCitizen($this);
        }

        return $this;
    }

    public function removeAside(Aside $aside): self
    {
        if ($this->asides->removeElement($aside)) {
            // set the owning side to null (unless already changed)
            if ($aside->getCitizen() === $this) {
                $aside->setCitizen(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Favorites[]
     */
    public function getFavorites(): Collection
    {
        return $this->favorites;
    }

    public function addFavorite(Favorites $favorite): self
    {
        if (!$this->favorites->contains($favorite)) {
            $this->favorites[] = $favorite;
            $favorite->setCitizen($this);
        }

        return $this;
    }

    public function removeFavorite(Favorites $favorite): self
    {
        if ($this->favorites->removeElement($favorite)) {
            // set the owning side to null (unless already changed)
            if ($favorite->getCitizen() === $this) {
                $favorite->setCitizen(null);
            }
        }

        return $this;
    }

}
