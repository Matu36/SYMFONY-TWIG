<?php

namespace App\Controller;

use App\Services\SentimentalService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class SENTIMENTALController extends AbstractController
{

    private $sentimentalService;
    private $serializer;

    public function __construct(SentimentalService $sentimentalService, SerializerInterface $serializer)
    {
        $this->sentimentalService = $sentimentalService;
        $this->serializer = $serializer;
    }
    /**
     * @Route("/sentimental", name="sentimental")
     */
    public function GetSentimental(Request $request): Response
    {
        $sentimental = $this->sentimentalService->findAllSentimentalWithRelations();

        $json = $this->serializer->serialize($sentimental, 'json');

        if (empty($sentimental)) {
            
            $response = ['message' => 'Aún no hay ningún sentimiento.'];
            return new JsonResponse($response, 200);
        }

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        return $this->render('sentimental/index.html.twig', [
            'sentimental' => $sentimental,
        ]);
    }
    /**
     * @Route("/sentimental/{id}", name="sentimental_id")
     */
    public function getSentimentalById(int $id, Request $request): Response
    {
        $sentimental = $this->sentimentalService->findSentimentalByIdWithRelations($id);

        $json = $this->serializer->serialize($sentimental, 'json');

        if (empty($sentimental)) {
            
            $response = ['message' => 'Aún no hay ningún sentimiento del id seleccionado.'];
            return new JsonResponse($response, 200);
        }

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$sentimental) {
            throw $this->createNotFoundException('No se encontró el Mensaje con el ID proporcionado');
        }

        return $this->render('sentimental/index.html.twig', [
            'sentimental' => [$sentimental],
        ]);
    }
}