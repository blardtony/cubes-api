<?php

namespace App\Controller;

use App\Repository\ChallengeRepository;
use App\Repository\RessourceRepository;
use App\Repository\SynopsisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ChallengeController extends AbstractController
{
    /**
     * @Route("/challenges", name="challenge_list", methods={"GET"})
     * @param SerializerInterface $serializer
     * @param ChallengeRepository $challengeRepository
     * @return JsonResponse
     */
    public function getInfos(SerializerInterface $serializer, ChallengeRepository $challengeRepository): JsonResponse
    {
        $challenges = $challengeRepository->findAll();
        //dd($challenges);
        //dd( $serializer->serialize($challenges, 'json', ['groups' => 'ressource:get']));
        return new JsonResponse(
            $serializer->serialize($challenges, 'json', ['groups' => 'ressource:get']),
            200,
            [],
            true
        );
    }
}
