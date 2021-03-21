<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class UserController
 * @package App\Controller
 */
class UserController extends AbstractController
{
    /**
     * @Route("/api/user/me", name="user_infos", methods={"GET"})
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function getInfos(SerializerInterface $serializer): JsonResponse
    {
        //dd($this->getUser());
        $user = $this->getUser();
        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }
        return new JsonResponse(
            $serializer->serialize($user, 'json', ['groups' => 'get']),
            200,
            [],
            true
        );
    }

    //Créer des formulaire différents en fonction du type de ressource
    //Coté API créer un méthode pour chaque type.
    // Ou créer une fonction globale ou on récupère les données ensemble exemple : Type de ressource, Ressource, Category
}
