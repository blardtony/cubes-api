<?php

namespace App\Controller;

use App\Repository\RessourceRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class AdminController
 * @package App\Controller
 * @Route("/api/admin", name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/ressources/unvalid", name="ressources_unvalid_list", methods={"GET"})
     * @param SerializerInterface $serializer
     * @param RessourceRepository $ressourceRepository
     * @return JsonResponse
     */
    public function getAllRessourcesUnvalid(SerializerInterface $serializer, RessourceRepository $ressourceRepository): JsonResponse
    {
        $ressources = $ressourceRepository->findBy(["validate"=> false]);

        return new JsonResponse(
            $serializer->serialize($ressources, 'json', ['groups' => 'ressource:get']),
            200,
            [],
            true
        );

    }

    /**
     * @Route("/validate/ressource", name="ressource_validate", methods={"POST"})
     * @param SerializerInterface $serializer
     * @param RessourceRepository $ressourceRepository
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @return JsonResponse
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function validateRessource(SerializerInterface $serializer, RessourceRepository $ressourceRepository, EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
        $id = json_decode($request->getContent(), true)['id'];

        $ressource = $ressourceRepository->find($id);
        $ressource->setValidate(true);
        $entityManager->persist($ressource);
        $entityManager->flush();

        return new JsonResponse(
            $serializer->serialize($ressource, 'json', ['groups' => 'ressource:get']),
            200,
            [],
            true
        );

    }

    /**
     * @Route("/ressources/category/{id}", name="ressources_unvalid_list_by_category", methods={"GET"})
     * @param SerializerInterface $serializer
     * @param RessourceRepository $ressourceRepository
     * @param int $id
     * @return JsonResponse
     */
    public function getAllRessourcesUnvalidByCategoryId(SerializerInterface $serializer, RessourceRepository $ressourceRepository, int $id): JsonResponse
    {
        $ressources = $ressourceRepository->findByCategoryUnvalid($id);

        return new JsonResponse(
            $serializer->serialize($ressources, 'json', ['groups' => 'ressource:get']),
            200,
            [],
            true
        );

    }
}
