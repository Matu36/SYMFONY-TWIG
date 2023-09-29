<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\AlbumService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class ALBUMController extends AbstractController
{
    private $albumService;
    private $serializer;

    public function __construct(AlbumService $albumService, SerializerInterface $serializer)
    {
        $this->albumService = $albumService;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/album", name="album")
     */
    public function getAlbum(Request $request): Response
    {
        $albums = $this->albumService->findAllAlbumWithRelations();

        $json = $this->serializer->serialize($albums, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        return $this->render('album/index.html.twig', [
            'albums' => $albums,
        ]);
    }

    /**
     * @Route("/album/{id}", name="album_id")
     */
    public function getAlbumById(int $id, Request $request): Response
    {
        $albums = $this->albumService->findAlbumByIdWithRelations($id);

        $json = $this->serializer->serialize($albums, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$albums) {
            throw $this->createNotFoundException('No se encontró el álbum con el ID proporcionado');
        }

        return $this->render('album/index.html.twig', [
            'albums' => $albums,
        ]);
    }
}