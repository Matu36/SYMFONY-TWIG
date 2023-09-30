<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\AmigosService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class AMIGOSController extends AbstractController
{

    private $amigosService;
    private $serializer;

    public function __construct(AmigosService $amigosService, SerializerInterface $serializer)
    {
        $this->amigosService = $amigosService;
        $this->serializer = $serializer;
    }
    /**
     * @Route("/amigos", name="amigos")
     */
    public function getAmigos(Request $request): Response
    {
        $amigos = $this->amigosService->findAllAmigosWithRelations();

        $json = $this->serializer->serialize($amigos, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        return $this->render('amigos/index.html.twig', [
            'amigos' => $amigos,
        ]);
    }

    /**
     * @Route("/amigos/{id}", name="amigos_id")
     */
    public function getAmigosById(int $id, Request $request): Response
    {
        $amigos = $this->amigosService->findAmigosByIdWithRelations($id);

        $json = $this->serializer->serialize($amigos, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$amigos) {
            throw $this->createNotFoundException('No se encontró el amigo con el ID proporcionado');
        }

        return $this->render('amigos/index.html.twig', [
            'amigos' => [$amigos],
        ]);
    }
}