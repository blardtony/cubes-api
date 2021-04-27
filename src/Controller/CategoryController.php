<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ChallengeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CategoryController extends AbstractController
{
    /**
     * @Route("/categories", name="category_list", methods={"GET"})
     * @param SerializerInterface $serializer
     * @param CategoryRepository $categoryRepository
     * @return JsonResponse
     */
    public function getAllCategories(SerializerInterface $serializer, CategoryRepository $categoryRepository): JsonResponse
    {
        $categories = $categoryRepository->findAll();

        return new JsonResponse(
            $serializer->serialize($categories, 'json', ['groups' => 'ressource:get']),
            200,
            [],
            true
        );

    }
}
