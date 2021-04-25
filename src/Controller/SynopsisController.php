<?php

namespace App\Controller;

use App\Repository\ChallengeRepository;
use App\Repository\SynopsisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class SynopsisController extends AbstractController
{
    /**
     * @Route("/synopsis", name="synopsis_list", methods={"GET"})
     * @param SerializerInterface $serializer
     * @param SynopsisRepository $synopsisRepository
     * @return JsonResponse
     */
    public function getAllSynopsis(SerializerInterface $serializer, SynopsisRepository $synopsisRepository): JsonResponse
    {
        $synopsis = $synopsisRepository->findAll();

        return new JsonResponse(
            $serializer->serialize($synopsis, 'json', ['groups' => 'ressource:get']),
            200,
            [],
            true
        );

    }
}
