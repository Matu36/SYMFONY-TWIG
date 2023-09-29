<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\CorazonService;    
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class CORAZONController extends AbstractController
{

    private $corazonService;
    private $serializer;

    public function __construct(CorazonService $corazonService, SerializerInterface $serializer)
    {
        $this->corazonService = $corazonService;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/corazon", name="corazon")
     */
    public function GetCorazones(Request $request): Response
    {
        $corazones = $this->corazonService->findAllCorazonWithRelations();

        $json = $this->serializer->serialize($corazones, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        return $this->render('corazon/index.html.twig', [
            'corazones' => $corazones,
        ]);
    }

    /**
     * @Route("/corazones/{id}", name="corazones_id")
     */
    public function getCorazonesById(int $id, Request $request): Response
    {
        $corazones = $this->corazonService->findCorazonByIdWithRelations($id);

        $json = $this->serializer->serialize($corazones, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$corazones) {
            throw $this->createNotFoundException('No se encontró el Corazón con el ID proporcionado');
        }

        return $this->render('corazon/index.html.twig', [
            'corazones' => $corazones,
        ]);
    }
}