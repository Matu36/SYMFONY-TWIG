<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\CountryService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class COUNTRYController extends AbstractController
{


    private $countryService;
    private $serializer;

    public function __construct(CountryService $countryService, SerializerInterface $serializer)
    {
        $this->countryService = $countryService;
        $this->serializer = $serializer;
    }
    /**
     * @Route("/countrys", name="countrys")
     */
    public function GetCountrys(Request $request): Response
    { {
            $countrys = $this->countryService->findAllCountryWithRelations();

            $json = $this->serializer->serialize($countrys, 'json');

            if ($request->headers->get('Accept') === 'application/json') {
                return new JsonResponse($json, 200, [], true);
            }

            return $this->render('country/index.html.twig', [
                'countrys' => $countrys,
            ]);
        }
    }

    /**
     * @Route("/countrys/{id}", name="countrys_id")
     */
    public function getCountrysById(int $id, Request $request): Response
    {
        $countrys = $this->countryService->findCountryByIdWithRelations($id);

        $json = $this->serializer->serialize($countrys, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$countrys) {
            throw $this->createNotFoundException('No se encontró el Country con el ID proporcionado');
        }

        return $this->render('country/index.html.twig', [
            'countrys' => $countrys,
        ]);
    }
}