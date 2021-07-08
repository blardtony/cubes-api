<?php

namespace App\Tests;

use App\Entity\Category;
use App\Entity\Challenge;
use App\Entity\Citizen;
use App\Entity\Synopsis;
use PHPUnit\Framework\TestCase;

class RessourceUnitTest extends TestCase
{

    private $category;
    private $author;

    protected function setUp(): void
    {
        $this->author = new Citizen();
        $this->category = new Category();
        $this->category->setName("Categorie test");
        $this->author->setFirstname("Prénom")
            ->setName("Nom")
            ->setEmail("user@email.com")
            ->setPassword(
                'the_new_password'
            )
            ->setBirthday(new \DateTimeImmutable("1990-03-23T00:00:00+02:00"));
    }

    public function testCreationChallenge(): void
    {

        $ressource = new Challenge();

        $ressource->setTitle("Titre")
        ->setContent("Content")
        ->setCategory($this->category)
        ->setAuthor($this->author);

        $this->assertTrue($ressource->getTitle() === "Titre");
        $this->assertTrue($ressource->getContent() === "Content");
        $this->assertTrue($ressource->getAuthor() === $this->author);
        $this->assertTrue($ressource->getShare() === false);
        $this->assertTrue($ressource->getSuspend() === false);
        $this->assertTrue($ressource->getValidate() === false);
        $this->assertTrue($ressource->getBonus() === null);
    }

    public function testCreationSynopsis(): void
    {

        $ressource = new Synopsis();

        $ressource->setTitle("Titre")
            ->setContent("Content")
            ->setCategory($this->category)
            ->setBirthdayAuthor(new \DateTimeImmutable("1990-03-23T00:00:00+02:00"))
            ->setDeathAuthor(new \DateTimeImmutable("2020-03-23T00:00:00+02:00"))
            ->setLiteraryMovement("Classique")
            ->setAuthor($this->author)
            ->setAuthorBook("Stendhal");

        $this->assertTrue($ressource->getTitle() === "Titre");
        $this->assertTrue($ressource->getContent() === "Content");
        $this->assertTrue($ressource->getAuthor() === $this->author);
        $this->assertTrue($ressource->getAuthorBook() == "Stendhal");
        $this->assertTrue($ressource->getLiteraryMovement() == "Classique");
        $this->assertTrue($ressource->getBirthdayAuthor() == new \DateTimeImmutable("1990-03-23T00:00:00+02:00"));
        $this->assertTrue($ressource->getDeathAuthor() == new \DateTimeImmutable("2020-03-23T00:00:00+02:00"));
        $this->assertTrue($ressource->getShare() === false);
        $this->assertTrue($ressource->getSuspend() === false);
        $this->assertTrue($ressource->getValidate() === false);
    }
}
