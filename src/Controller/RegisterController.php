<?php

namespace App\Controller;

use App\Entity\Citizen;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

class RegisterController extends AbstractController
{
    private $PasswordEncode;
    public function __construct(UserPasswordEncoderInterface $PasswordEncode)
    {
        $this->PasswordEncode=$PasswordEncode;
    }

    /**
     * @Route("/register", name="register", methods={"POST", "OPTIONS"})
     * @param SerializerInterface $serializer
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     */
    public function register(SerializerInterface $serializer, Request $request, EntityManagerInterface $entityManager):JsonResponse
    {

        $user = $serializer->deserialize($request->getContent(), Citizen::class, 'json');

        $user->setPassword($this->PasswordEncode->encodePassword(
            $user,
            $user->getPassword()
        ));

        $entityManager->persist($user);
        $entityManager->flush();

        return new JsonResponse(
            $serializer->serialize($user, 'json', ['groups' => 'get']),
            JsonResponse::HTTP_CREATED,
            [],
            true
        );

    }
}
