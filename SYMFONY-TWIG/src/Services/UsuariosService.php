<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\USUARIOSRepository;

class UsuariosService
{
    private $entityManager;
    private $usuariosRepository;

    public function __construct(EntityManagerInterface $entityManager, USUARIOSRepository $usuariosRepository)
    {
        $this->entityManager = $entityManager;
        $this->usuariosRepository = $usuariosRepository;
    }

    public function findAllusuariosByIdWithRelations()
    {
        try {
            $usuarios = $this->usuariosRepository->findUsuarioById($id);
            return $usuarios;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar los sentimentales  con relaciones: ' . $e->getMessage());
        }
    }

    public function findUsuarioByEmail(string $email)
    {
        try {
            $usuario = $this->usuariosRepository->findUsuarioByEmail($email);
            return $usuario;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el sentimental con relaciones por ID: ' . $e->getMessage());
        }
    }
}