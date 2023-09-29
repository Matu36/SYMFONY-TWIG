<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\AMIGOSRepository;

class AmigosService
{
    private $entityManager;
    private $amigosRepository;

    public function __construct(EntityManagerInterface $entityManager, AMIGOSRepository $amigosRepository)
    {
        $this->entityManager = $entityManager;
        $this->amigosRepository = $amigosRepository;
    }

    public function findAllAmigosWithRelations()
    {
        try {
            $amigos = $this->amigosRepository->findAllAmigosWithRelations();
            return $amigos;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar los Amigos con relaciones: ' . $e->getMessage());
        }
    }

    public function findAmigosByIdWithRelations(int $id)
    {
        try {
            $amigo = $this->amigosRepository->findAmigosByIdWithRelations($id);
            return $amigo;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el Amigos con relaciones por ID: ' . $e->getMessage());
        }
    }
}
