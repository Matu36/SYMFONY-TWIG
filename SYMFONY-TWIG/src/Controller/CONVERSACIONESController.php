<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ConversacionesService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class CONVERSACIONESController extends AbstractController
{

    private $conversacionesService;
    private $serializer;

    public function __construct(ConversacionesService $conversacionesService, SerializerInterface $serializer)
    {
        $this->conversacionesService = $conversacionesService;
        $this->serializer = $serializer;
    }
    
    
     /**
     * @Route("/conversaciones", name="conversaciones")
     */
    public function GetConversaciones(Request $request): Response
    {

        $conversaciones = $this->conversacionesService->findAllConversacionesWithRelations();

        $json = $this->serializer->serialize($conversaciones, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        return $this->render('conversaciones/index.html.twig', [
            'conversaciones' => $conversaciones,
        ]);


    }

    /**
     * @Route("/conversaciones/{id}", name="conversaciones_id")
     */
    public function getComentariosById(int $id, Request $request): Response
    {
        $conversaciones = $this->conversacionesService->findConversacionesByIdWithRelations($id);

        $json = $this->serializer->serialize($conversaciones, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$conversaciones) {
            throw $this->createNotFoundException('No se encontró la Conversación con el ID proporcionado');
        }

        return $this->render('conversaciones/index.html.twig', [
            'conversaciones' => $conversaciones,
        ]);
    }
}