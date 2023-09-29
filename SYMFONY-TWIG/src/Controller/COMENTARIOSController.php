<?php

// A SOLUCIONAR = RELACION BIDIRECCIONAL!

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ComentariosService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class COMENTARIOSController extends AbstractController
{

    private $comentariosService;
    private $serializer;

    public function __construct(ComentariosService $comentariosService, SerializerInterface $serializer)
    {
        $this->comentariosService = $comentariosService;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/comentarios", name="comentarios")
     */

    public function GetComentarios(Request $request): Response
    {

        $comentarios = $this->comentariosService->findAllComentariosWithRelations();

        $json = $this->serializer->serialize($comentarios, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        return $this->render('comentarios/index.html.twig', [
            'comentarios' => $comentarios,
        ]);

    }

    /**
     * @Route("/comentarios/{id}", name="comentarios_id")
     */
    public function getComentariosById(int $id, Request $request): Response
    {
        $comentarios = $this->comentariosService->findComentariosByIdWithRelations($id);

        $json = $this->serializer->serialize($comentarios, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$comentarios) {
            throw $this->createNotFoundException('No se encontró el comentario con el ID proporcionado');
        }

        return $this->render('comentarios/index.html.twig', [
            'comentarios' => $comentarios,
        ]);
    }
}
