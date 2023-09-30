<?php

namespace App\Controller;

use App\Services\PImagenService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class POSTIMAGENController extends AbstractController
{

    private $postImagenService;
    private $serializer;

    public function __construct(PImagenService $postImagenService, SerializerInterface $serializer)
    {
        $this->postImagenService = $postImagenService;
        $this->serializer = $serializer;
    }
    /**
     * @Route("/postImagen", name="postImagen")
     */
    public function GetPostImagen(Request $request): Response
    {
        $postImagen = $this->postImagenService->findAllPostImageWithRelations();

        $json = $this->serializer->serialize($postImagen, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        return $this->render('postimagen/index.html.twig', [
            'postImagen' => $postImagen,
        ]);
    }

    /**
     * @Route("/postImagen/{id}", name="postImagen_id")
     */
    public function getPostImagenById(int $id, Request $request): Response
    {
        $postImagen = $this->postImagenService->findPostImageByIdWithRelations($id);

        $json = $this->serializer->serialize($postImagen, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$postImagen) {
            throw $this->createNotFoundException('No se encontró el Mensaje con el ID proporcionado');
        }

        return $this->render('postimagen/index.html.twig', [
            'postImagen' => [$postImagen],
        ]);
    }
}