<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;


class UserFixtures extends Fixture
{
    private $PasswordEncode;
    public function __construct(UserPasswordEncoderInterface $PasswordEncode)
    {
        $this->PasswordEncode=$PasswordEncode;
    }
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i <=2 ; $i++) {
            $user = new User();
            $user->setEmail(sprintf("email%d@gmail.com", $i));

            $user->setPassword($this->PasswordEncode->encodePassword(
                $user,
                'the_new_password'
            ));

            $manager->persist($user);
        }
        $manager->flush();

    }
}
