<?php

namespace App\Controller;

use App\Entity\RECOVER;
use App\Repository\RECOVERRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RECOVERController extends AbstractController
{
     /**
     * @Route("/recover", name="recover")
     */
    public function index(RECOVERRepository $recoverRepository): JsonResponse
    {
        $recoversWithUserData = $recoverRepository->findRecoversWithUserData();

       
        $formattedResults = [];
        foreach ($recoversWithUserData as $recover) {
            $userData = [
                'id' => $recover->getUsuario()->getId(),
                'nombre' => $recover->getUsuario()->getNombre(),
                'apellido' => $recover->getUsuario()->getApellido(),
                'email' => $recover->getUsuario()->getEmail(),
                'fecha' => $recover->getUsuario()->getCreatedAd(),
            ];

            $formattedResults[] = [
                'id' => $recover->getId(),
                'userData' => $userData,
                'code' => $recover->getCode(),
                'usado' => $recover->isUsado(),
                'createdAt' => $recover->getCreatedAt()->format('Y-m-d H:i:s'),
            ];
        }

        return $this->json($formattedResults);
    }

 /**
 * @Route("/recover/recover/{id}", name="recoverId", requirements={"id"="\d+"})
 */
public function findBYId(RECOVERRepository $recoverRepository, $id): JsonResponse
{
    $recoverWithUserData = $recoverRepository->findRecoverByIdWithUserData($id);

    if (!$recoverWithUserData) {
        return $this->json(['message' => 'No se encontró ningún registro con ese ID.'], 404);
    }

    $userData = [
        'id' => $recoverWithUserData->getUsuario()->getId(),
        'nombre' => $recoverWithUserData->getUsuario()->getNombre(),
        'apellido' => $recoverWithUserData->getUsuario()->getApellido(),
        'email' => $recoverWithUserData->getUsuario()->getEmail(),
        'fecha' => $recoverWithUserData->getUsuario()->getCreatedAd()->format('Y-m-d H:i:s'),
    ];

    $formattedResult = [
        'id' => $id, 
        'userData' => $userData,
        'code' => $recoverWithUserData->getCode(),
        'usado' => $recoverWithUserData->isUsado(),
        'createdAt' => $recoverWithUserData->getCreatedAt()->format('Y-m-d H:i:s'),
    ];

    return $this->json($formattedResult);
}

}

