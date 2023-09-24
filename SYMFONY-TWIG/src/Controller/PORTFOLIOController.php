<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PORTFOLIORepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class PORTFOLIOController extends AbstractController
{
    /**
     * @Route("/portfolios", name="list_portfolios")
     */
    public function getAllPortfolios(PORTFOLIORepository $portfolioRepository, SerializerInterface $serializer): JsonResponse
    {
        $portfolios = $portfolioRepository->findAllPortfoliosWithRelations();

        // Serializa los resultados en formato JSON
        $json = $serializer->serialize($portfolios, 'json');

        // Crea una respuesta JSON
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @Route("/portfolio/{id}", name="get_portfolio")
     */
    public function getPortfolioById(int $id, PORTFOLIORepository $portfolioRepository, SerializerInterface $serializer): JsonResponse
    {
        $portfolio = $portfolioRepository->findPortfolioByIdWithRelations($id);

        if (!$portfolio) {
            return new JsonResponse(['message' => 'No se encontró el portfolio con el ID proporcionado'], 404);
        }

        // Serializa el resultado en formato JSON
        $json = $serializer->serialize($portfolio, 'json');

        // Crea una respuesta JSON
        return new JsonResponse($json, 200, [], true);
    }
}