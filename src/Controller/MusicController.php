<?php


namespace App\Controller;

use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Music;
use App\Repository\MusicRepository;

use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\DocBlock\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;


/**
 * Class MusicController
 * @package App\Controller
 * @Route("/musics")
 */
class MusicController
{

    /**
     * @Route(name="api_musics_get", methods={"GET"})
     * @param MusicRepository $repository
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function collection(MusicRepository $repository, SerializerInterface $serializer): JsonResponse
    {
        return new JsonResponse(
            $serializer->serialize($repository->findAll(), "json",  ["groups" => "get"]),
            JsonResponse::HTTP_OK,
            [],
            true
        );
    }

    /**
     * @Route("/{id}", name="api_musics_get_item", methods={"GET"})
     * @param MusicRepository $repository
     * @param Request $request,
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function item(MusicRepository $repository,
                         Request $request,
                         SerializerInterface $serializer): JsonResponse
    {
        return new JsonResponse(
            $serializer->serialize($repository->find($request->get('id')), 'json',  ["groups" => "get"]),
            JsonResponse::HTTP_OK,
            [],
            true
        );
    }

    /**
     * @Route(name="api_musics_post", methods={"POST"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param SerializerInterface $serializer
     * @param UrlGeneratorInterface $urlGenerator
     * @return JsonResponse
     */
    public function post(Request $request,
                         EntityManagerInterface $entityManager,
                         SerializerInterface $serializer,
                         UrlGeneratorInterface $urlGenerator): JsonResponse {

        /**
         * Define music
         */
        $music = $serializer->deserialize($request->getContent(), Music::class, 'json');
        $music->setArtist($entityManager->getRepository(Artist::class)->findOneBy([]));
        $music->setAlbum($entityManager->getRepository(Album::class)->findOneBy([]));

        $entityManager->persist($music);
        $entityManager->flush();

        return new JsonResponse(
            $serializer->serialize($music, "json", ["groups" => "get"]),
            JsonResponse::HTTP_CREATED,
            ["Location" => $urlGenerator->generate("api_musics_post", ["id" => $music->getId()])],
            true
        );
    }

    /**
     * @Route("/{id}", name="api_musics_put", methods={"PUT"})
     * @param Request $request
     * @param MusicRepository $repository
     * @param EntityManagerInterface $entityManager
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function put(Request $request,
                        MusicRepository $repository,
                        EntityManagerInterface $entityManager,
                        SerializerInterface $serializer): JsonResponse {

        /**
         * Redefine music
         */
        $music = $repository->find($request->get('id'));

        $serializer->deserialize(
            $request->getContent(),
            Music::class,
            'json',
            [AbstractNormalizer::OBJECT_TO_POPULATE => $music]
        );

        $entityManager->flush();

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/{id}", name="api_musics_delete", methods={"DELETE"})
     * @param Request $request
     * @param MusicRepository $repository
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     */
    public function delete(Request $request,
                           MusicRepository $repository,
                           EntityManagerInterface $entityManager): JsonResponse {

        /**
         * Delete music
         */
        $music = $repository->find($request->get('id'));

        $entityManager->remove($music);
        $entityManager->flush();

        return new JsonResponse(null, JsonResponse::HTTP_ACCEPTED);
    }

}