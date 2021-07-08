<?php

namespace App\Tests;

use App\Entity\Admin;
use App\Entity\Citizen;
use DateTime;
use PHPUnit\Framework\TestCase;
class UserUnitTest extends TestCase
{

    public function testCreationCompteCitoyen(): void
    {
        $user = new Citizen();

        $user->setFirstname("Prénom")
            ->setName("Nom")
            ->setEmail("user@email.com")
             ->setPassword(
                 'the_new_password'
             )
            ->setBirthday(new \DateTimeImmutable("1990-03-23T00:00:00+02:00"));

        $this->assertTrue($user->getEmail() === "user@email.com");
        $this->assertTrue($user->getName() === "Nom");
        $this->assertTrue($user->getFirstname() === "Prénom");
        $this->assertTrue($user->getPassword() === "the_new_password");
        $this->assertTrue($user->getRoles() === ["ROLE_USER"]);
    }

    public function testCreationCompteAdmin(): void
    {
        $admin = new Admin();

        $admin->setFirstname("Prénom")
            ->setName("Nom")
            ->setEmail("user@email.com")
            ->setPassword(
                'the_new_password'
            )
            ->setBirthday(new \DateTimeImmutable("1990-03-23T00:00:00+02:00"));

        $this->assertTrue($admin->getEmail() === "user@email.com");
        $this->assertTrue($admin->getName() === "Nom");
        $this->assertTrue($admin->getFirstname() === "Prénom");
        $this->assertTrue($admin->getPassword() === "the_new_password");
        $this->assertTrue($admin->getRoles() === ["ROLE_ADMIN", "ROLE_USER"]);
    }
}
