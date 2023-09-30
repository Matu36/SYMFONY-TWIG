<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\EquipoService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class EQUIPOController extends AbstractController
{

    private $equipoService;
    private $serializer;

    public function __construct(EquipoService $equipoService, SerializerInterface $serializer)
    {
        $this->equipoService = $equipoService;
        $this->serializer = $serializer;
    }
    /**
     * @Route("/equipos", name="equipos")
     */
    public function getEquipos(Request $request): Response
    { {
            $equipos = $this->equipoService->findAllEquipoWithRelations();

            $json = $this->serializer->serialize($equipos, 'json');

            if (empty($equipos)) {
                $response = ['message' => 'Aún no hay equipos.'];
                return new JsonResponse($response, 200);
            }

            if ($request->headers->get('Accept') === 'application/json') {
                return new JsonResponse($json, 200, [], true);
            }

            return $this->render('equipo/index.html.twig', [
                'equipos' => $equipos,
            ]);
        }
    }

    /**
     * @Route("/equipos/{id}", name="equipos_id")
     */
    public function getEquiposById(int $id, Request $request): Response
    {
        $equipos = $this->equipoService->findEquipoByIdWithRelations($id);

        $json = $this->serializer->serialize($equipos, 'json');

        if (empty($equipos)) {
            $response = ['message' => 'Aún no hay equipos del id seleccionado.'];
            return new JsonResponse($response, 200);
        }

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$equipos) {
            throw $this->createNotFoundException('No se encontró el Equipo con el ID proporcionado');
        }

        return $this->render('equipo/index.html.twig', [
            'equipos' => [$equipos],
        ]);
    }
}