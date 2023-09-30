<?php

namespace App\Controller;

use App\Services\RecoverService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class RECOVERController extends AbstractController
{

    private $recoverService;
    private $serializer;

    public function __construct(RecoverService $recoverService, SerializerInterface $serializer)
    {
        $this->recoverService = $recoverService;
        $this->serializer = $serializer;
    }
    /**
     * @Route("/recover", name="recover")
     */
    public function GetRecovers(Request $request): Response
    {
        $recover = $this->recoverService->findAllRecoverWithRelations();

        $json = $this->serializer->serialize($recover, 'json');

        if (empty($recover)) {

            $response = ['message' => 'Aún no hay ningún intento de recuperar el usuario.'];
            return new JsonResponse($response, 200);
        }

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        return $this->render('recover/index.html.twig', [
            'recover' => $recover,
        ]);
    }

    /**
     * @Route("/recover/{id}", name="recover_Id")
     */
    public function RecoverById(int $id, Request $request): JsonResponse
    {
        $recover = $this->recoverService->findRecoverByIdWithRelations($id);

        $json = $this->serializer->serialize($recover, 'json');

        if (empty($recover)) {

            $response = ['message' => 'Aún no hay ningún intento de recuperar el 
            usuario del id seleccionado.'];
            return new JsonResponse($response, 200);
        }

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$recover) {
            throw $this->createNotFoundException('No se encontró el Mensaje con el ID proporcionado');
        }

        return $this->render('recover/index.html.twig', [
            'recover' => [$recover],
        ]);
    }
}