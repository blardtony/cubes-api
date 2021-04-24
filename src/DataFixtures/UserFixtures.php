<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Citizen;
use App\Entity\Synopsis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Entity\Challenge;


class UserFixtures extends Fixture
{
    private $PasswordEncode;
    public function __construct(UserPasswordEncoderInterface $PasswordEncode)
    {
        $this->PasswordEncode=$PasswordEncode;
    }
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName("Categorie");
        $manager->persist($category);

        for ($i=0; $i <=2 ; $i++) {
            $user = new Citizen();
            $user->setEmail(sprintf("email%d@gmail.com", $i));

            $user->setPassword($this->PasswordEncode->encodePassword(
                $user,
                'the_new_password'
            ));
            $user->setFirstname(sprintf("firstname %d", $i));
            $user->setName(sprintf("last name %d", $i));
            $user->setBirthday(new \DateTimeImmutable('1998-09-16 00:00'));
            $manager->persist($user);


            $challenge = new Challenge();
            $challenge->setContent("Content TEST");
            $challenge->setBonus("Bonus");
            $challenge->setShare(0);
            $challenge->setSuspend(0);
            $challenge->setTitle("title challenge");
            $challenge->setValidate(1);
            $challenge->setCategory($category);
            $challenge->setAuthor($user);

            $synopsis = new Synopsis();
            $synopsis->setShare(0);
            $synopsis->setSuspend(0);
            $synopsis->setTitle("title synopsis");
            $synopsis->setValidate(1);
            $synopsis->setCategory($category);
            $synopsis->setContent("Content fiche lecture");
            $synopsis->setBirthdayAuthor(new \DateTimeImmutable('1985-09-16 00:00'));
            $synopsis->setAuthorBook("Auteur");
            $synopsis->setDeathAuthor(new \DateTimeImmutable('2010-09-16 00:00'));
            $synopsis->setGenre("Genre");
            $synopsis->setLiteraryMovement("Mouvement litérraire");
            $synopsis->setOpinion("Mauvais");
            $synopsis->setPublishDate(new \DateTimeImmutable('2000-09-16 00:00'));
            $synopsis->setAuthor($user);
            $manager->persist($challenge);
            $manager->persist($synopsis);
        }

        $manager->flush();

    }
}
