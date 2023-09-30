<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ImagenService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class IMAGENController extends AbstractController
{

    private $imagenService;
    private $serializer;

    public function __construct(ImagenService $imagenService, SerializerInterface $serializer)
    {
        $this->imagenService = $imagenService;
        $this->serializer = $serializer;
    }
    /**
     * @Route("/imagenes", name="imagenes")
     */
    public function getImagenes(Request $request): Response
    { {
            $imagenes = $this->imagenService->findAllImagenWithRelations();

            $json = $this->serializer->serialize($imagenes, 'json');

            if (empty($imagenes)) {
                $response = ['message' => 'Aún no hay imagenes.'];
                return new JsonResponse($response, 200);
            }

            if ($request->headers->get('Accept') === 'application/json') {
                return new JsonResponse($json, 200, [], true);
            }

            return $this->render('imagen/index.html.twig', [
                'imagen' => $imagenes,
            ]);
        }
    }

    /**
     * @Route("/imagenes/{id}", name="imagenes_id")
     */
    public function getImagenesById(int $id, Request $request): Response
    {
        $imagen = $this->imagenService->findImagenByIdWithRelations($id);

        $json = $this->serializer->serialize($imagen, 'json');

        if (empty($imagen)) {
            $response = ['message' => 'Aún no hay imagenes del id seleccionado.'];
            return new JsonResponse($response, 200);
        }

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$imagen) {
            throw $this->createNotFoundException('No se encontró la imagen con el ID proporcionado');
        }

        return $this->render('imagen/index.html.twig', [
            'imagen' => [$imagen],
        ]);
    }
}