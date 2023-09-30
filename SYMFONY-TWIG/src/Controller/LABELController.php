<?php

namespace App\Controller;

use App\Services\LabelService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class LABELController extends AbstractController
{

    private $labelService;
    private $serializer;

    public function __construct(LabelService $labelService, SerializerInterface $serializer)
    {
        $this->labelService = $labelService;
        $this->serializer = $serializer;
    }
    /**
     * @Route("/label", name="label")
     */
    public function GetLevel(Request $request): Response
    {
        $levels = $this->labelService->findAllLevelWithRelations();

            $json = $this->serializer->serialize($levels, 'json');

            if (empty($levels)) {
                $response = ['message' => 'Aún no hay Levels.'];
                return new JsonResponse($response, 200);
            }

            if ($request->headers->get('Accept') === 'application/json') {
                return new JsonResponse($json, 200, [], true);
            }

            return $this->render('label/index.html.twig', [
                'levels' => $levels,
            ]);
    }

    /**
     * @Route("/label/{id}", name="label_id")
     */
    public function getLevelsById(int $id, Request $request): Response
    {
        $levels = $this->labelService->findLevelByIdWithRelations($id);

        $json = $this->serializer->serialize($levels, 'json');

        if (empty($levels)) {
            $response = ['message' => 'Aún no hay Levels del id seleccionado.'];
            return new JsonResponse($response, 200);
        }

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$levels) {
            throw $this->createNotFoundException('No se encontró la imagen con el ID proporcionado');
        }

        return $this->render('label/index.html.twig', [
            'levels' => [$levels],
        ]);
    }
}
