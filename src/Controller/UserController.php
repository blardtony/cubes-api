<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Challenge;
use App\Entity\Synopsis;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class UserController
 * @package App\Controller
 * @Route("/api/user", name="user_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/me", name="nfos", methods={"GET"})
     * @param SerializerInterface $serializer
     * @return JsonResponse
     * @throws \Exception
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

    /**
     * @Route("/challenge", name="challenge_post", methods={"POST", "OPTIONS"})
     * @param SerializerInterface $serializer
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     * @throws \Exception
     */
    public function postChallenge(SerializerInterface $serializer, Request $request, EntityManagerInterface $entityManager):JsonResponse
    {
        //dd($this->getUser());
        $user = $this->getUser();
        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        $data = json_decode($request->getContent(), true);

        $challenge = new Challenge();

        $challenge->setTitle($data['title']);
        $challenge->setContent($data['content']);

        $category = $entityManager->getRepository(Category::class)->findOneBy(['id' => $data['category']['id']]);

        $challenge->setCategory($category);
        $challenge->setAuthor($user);
        $entityManager->persist($challenge);
        $entityManager->flush();

        return new JsonResponse(
            $serializer->serialize($challenge, 'json', ['groups' => 'ressource:get']),
            JsonResponse::HTTP_CREATED,
            [],
            true
        );

    }

    /**
     * @Route("/challenge/{id}", name="challenge_put", methods={"PUT"})
     * @param SerializerInterface $serializer
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param int $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function putChallenge(SerializerInterface $serializer, Request $request, EntityManagerInterface $entityManager, int $id):JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        $data = json_decode($request->getContent(), true);

        $challenge = $entityManager->getRepository(Challenge::class)->findOneBy(['id' => $id]);

        $challenge->setTitle($data['title']);
        $challenge->setContent($data['content']);

        $category = $entityManager->getRepository(Category::class)->findOneBy(['id' => $data['category']['id']]);

        $challenge->setCategory($category);
        $entityManager->persist($challenge);
        //dd($challenge);
        $entityManager->flush();

        return new JsonResponse(
            $serializer->serialize($challenge, 'json', ['groups' => 'ressource:get']),
            JsonResponse::HTTP_OK,
            [],
            true
        );

    }


    /**
     * @Route("/challenge/{id}", name="challenge_delete", methods={"DELETE"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param int $id
     * @return JsonResponse
     */
    public function deleteChallenge(Request $request, EntityManagerInterface $entityManager, int $id):JsonResponse
    {
        $challenge = $entityManager->getRepository(Challenge::class)->findOneBy(['id' => $id]);

        $entityManager->remove($challenge);
        $entityManager->flush();

        return new JsonResponse(
            null,
            JsonResponse::HTTP_OK
        );
    }


    /**
     * @Route("/synopsis", name="synopsis_post", methods={"POST"})
     * @param SerializerInterface $serializer
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     * @throws \Exception
     */
    public function postSynopsis(SerializerInterface $serializer, Request $request, EntityManagerInterface $entityManager):JsonResponse
    {
        //dd($this->getUser());
        $user = $this->getUser();
        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        $data = json_decode($request->getContent(), true);

        $synopsis = new Synopsis();

        $synopsis->setTitle($data['title']);
        $synopsis->setContent($data['content']);

        $synopsis->setAuthorBook($data['author']['name']);
        $synopsis->setBirthdayAuthor(new \DateTimeImmutable($data['author']['birthday']));
        $synopsis->setDeathAuthor(new \DateTimeImmutable($data['author']['death']));
        $synopsis->setLiteraryMovement($data['author']['literaryMovement']);
        $synopsis->setPublishDate(new \DateTimeImmutable($data['publishDate']));
        $synopsis->setOpinion($data['opinion']);

        $category = $entityManager->getRepository(Category::class)->findOneBy(['id' => $data['category']['id']]);

        $synopsis->setCategory($category);
        $synopsis->setAuthor($user);
        $entityManager->persist($synopsis);
        $entityManager->flush();

        return new JsonResponse(
            $serializer->serialize($synopsis, 'json', ['groups' => 'ressource:get']),
            JsonResponse::HTTP_CREATED,
            [],
            true
        );

    }

    /**
     * @Route("/synopsis/{id}", name="synopsis_put", methods={"PUT"})
     * @param SerializerInterface $serializer
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param int $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function putSynopsis(SerializerInterface $serializer, Request $request, EntityManagerInterface $entityManager, int $id):JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            throw new \Exception("Vous n'êtes pas connecté");
        }

        $data = json_decode($request->getContent(), true);

        $synopsis = $entityManager->getRepository(Synopsis::class)->findOneBy(['id' => $id]);

        $synopsis->setTitle($data['title']);
        $synopsis->setContent($data['content']);

        $synopsis->setAuthorBook($data['author']['name']);
        $synopsis->setBirthdayAuthor(new \DateTimeImmutable($data['author']['birthday']));
        $synopsis->setDeathAuthor(new \DateTimeImmutable($data['author']['death']));
        $synopsis->setLiteraryMovement($data['author']['literaryMovement']);
        $synopsis->setPublishDate(new \DateTimeImmutable($data['publishDate']));
        $synopsis->setOpinion($data['opinion']);

        $category = $entityManager->getRepository(Category::class)->findOneBy(['id' => $data['category']['id']]);
        $synopsis->setCategory($category);

        $entityManager->persist($synopsis);
        $entityManager->flush();

        return new JsonResponse(
            $serializer->serialize($synopsis, 'json', ['groups' => 'ressource:get']),
            JsonResponse::HTTP_OK,
            [],
            true
        );

    }


    /**
     * @Route("/synopsis/{id}", name="synopsis_delete", methods={"DELETE"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param int $id
     * @return JsonResponse
     */
    public function deleteSynopsis(Request $request, EntityManagerInterface $entityManager, int $id):JsonResponse
    {
        $synopsis = $entityManager->getRepository(Synopsis::class)->findOneBy(['id' => $id]);

        $entityManager->remove($synopsis);
        $entityManager->flush();

        return new JsonResponse(
            null,
            JsonResponse::HTTP_OK
        );
    }
}
