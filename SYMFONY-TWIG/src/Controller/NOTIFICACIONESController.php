<?php

namespace App\Controller;

use App\Services\NotificacionesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class NOTIFICACIONESController extends AbstractController
{

    private $notificacionesService;
    private $serializer;

    public function __construct(NotificacionesService $notificacionesService, SerializerInterface $serializer)
    {
        $this->notificacionesService = $notificacionesService;
        $this->serializer = $serializer;
    }
    /**
     * @Route("/notificaciones", name="notificaciones")
     */
    public function GetNotificaciones(Request $request): Response
    {
        $notificaciones = $this->notificacionesService->findAllNotificacioneslWithRelations();

        $json = $this->serializer->serialize($notificaciones, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        return $this->render('notificaciones/index.html.twig', [
            'notificaciones' => $notificaciones,
        ]);
    }

    /**
     * @Route("/notificaciones/{id}", name="notificaciones_id")
     */
    public function getNotificacionesById(int $id, Request $request): Response
    {
        $notificaciones = $this->notificacionesService->findNotificacionesByIdWithRelations($id);

        $json = $this->serializer->serialize($notificaciones, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$notificaciones) {
            throw $this->createNotFoundException('No se encontró el Mensaje con el ID proporcionado');
        }

        return $this->render('notificaciones/index.html.twig', [
            'notificaciones' => [$notificaciones],
        ]);
    }
}