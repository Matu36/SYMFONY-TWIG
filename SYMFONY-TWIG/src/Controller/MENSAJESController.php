<?php

namespace App\Controller;

use App\Services\MensajesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class MENSAJESController extends AbstractController
{

    private $mensajeService;
    private $serializer;

    public function __construct(MensajesService $mensajeService, SerializerInterface $serializer)
    {
        $this->mensajeService = $mensajeService;
        $this->serializer = $serializer;
    }
    /**
     * @Route("/mensajes", name="mensajes")
     */
    public function GetMensajes(Request $request): Response
    {
        $mensajes = $this->mensajeService->findAlMensajesWithRelations();

        $json = $this->serializer->serialize($mensajes, 'json');

        if (empty($mensajes)) {
            $response = ['message' => 'Aún no hay ningún mensaje.'];
            return new JsonResponse($response, 200);
        }

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        return $this->render('mensajes/index.html.twig', [
            'mensajes' => $mensajes,
        ]);
    }

    /**
     * @Route("/mensajes/{id}", name="mensajes_id")
     */
    public function getMensajesById(int $id, Request $request): Response
    {
        $mensajes = $this->mensajeService->findMensajesByIdWithRelations($id);

        $json = $this->serializer->serialize($mensajes, 'json');

        if (empty($mensajes)) {
            $response = ['message' => 'Aún no hay ningún mensaje del id seleccionado.'];
            return new JsonResponse($response, 200);
        }

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$mensajes) {
            throw $this->createNotFoundException('No se encontró el Mensaje con el ID proporcionado');
        }

        return $this->render('mensajes/index.html.twig', [
            'mensajes' => [$mensajes],
        ]);
    }
}