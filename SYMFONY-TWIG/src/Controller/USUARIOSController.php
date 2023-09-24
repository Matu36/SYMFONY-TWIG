<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\USUARIOS;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\USUARIOSRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;


class USUARIOSController extends AbstractController
{
    /**
     * @Route("/usuarios", name="list_usuarios", methods={"GET"})
     */
    public function getAllUsuarios(EntityManagerInterface $entityManager)
    {
        // Obtén el repositorio de la entidad USUARIOS
        $usuariosRepository = $entityManager->getRepository(USUARIOS::class);

        // Recupera todos los registros de la entidad
        $usuarios = $usuariosRepository->findAll();

        // Renderiza una vista o responde con los datos en formato JSON
        return $this->render('usuarios/index.html.twig', [
            'usuarios' => $usuarios,
        ]);
    }

    /**
     * @Route("/usuarios/usuarios/{id}", name="usuarioPorId")
     */
    public function UsuarioById(USUARIOSRepository $usuariosRepository, $id, SerializerInterface $serializer): JsonResponse
    {
        // Busca el usuario por ID
        $usuario = $usuariosRepository->findUsuarioById($id);

        if (!$usuario) {
            return $this->json(['message' => 'No se encontró ningún usuario con ese ID.'], 404);
        }

        // Serializa el objeto USUARIOS a JSON
        $data = $serializer->serialize($usuario, 'json');

        return new JsonResponse($data, 200, [], true);
    }
}