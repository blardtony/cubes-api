<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Ressource;
use App\Repository\ChallengeRepository;
use App\Repository\RessourceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class RessourceController extends AbstractController
{
    /**
     * @Route("/ressources", name="ressources_list", methods={"GET"})
     * @param SerializerInterface $serializer
     * @param RessourceRepository $ressourceRepository
     * @return JsonResponse
     */
    public function getAllRessources(SerializerInterface $serializer, RessourceRepository $ressourceRepository): JsonResponse
    {
        $ressources = $ressourceRepository->findBy(["validate"=> true]);

        return new JsonResponse(
            $serializer->serialize($ressources, 'json', ['groups' => 'ressource:get']),
            200,
            [],
            true
        );

    }

    /**
     * @Route("/ressources/{id}", name="ressource_one", methods={"GET"})
     * @param SerializerInterface $serializer
     * @param RessourceRepository $ressourceRepository
     * @return JsonResponse
     */
    public function getRessource(SerializerInterface $serializer, RessourceRepository $ressourceRepository, int $id): JsonResponse
    {
        $ressources = $ressourceRepository->find($id);

        return new JsonResponse(
            $serializer->serialize($ressources, 'json', ['groups' => 'ressource:get']),
            200,
            [],
            true
        );

    }

    /**
     * @Route("/ressources/category/{id}", name="ressources_list_by_category", methods={"GET"})
     * @param SerializerInterface $serializer
     * @param RessourceRepository $ressourceRepository
     * @param int $id
     * @return JsonResponse
     */
    public function getAllRessourcesByCategoryId(SerializerInterface $serializer, RessourceRepository $ressourceRepository, int $id): JsonResponse
    {
        $ressources = $ressourceRepository->findByCategory($id);

        return new JsonResponse(
            $serializer->serialize($ressources, 'json', ['groups' => 'ressource:get']),
            200,
            [],
            true
        );

    }
}
