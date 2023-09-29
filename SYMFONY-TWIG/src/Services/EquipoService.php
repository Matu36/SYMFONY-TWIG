<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\EQUIPORepository;

class EquipoService
{
    private $entityManager;
    private $equipoRepository;

    public function __construct(EntityManagerInterface $entityManager, EQUIPORepository $equipoRepository)
    {
        $this->entityManager = $entityManager;
        $this->equipoRepository = $equipoRepository;
    }

    public function findAllEquipoWithRelations()
    {
        try {
            $equipos = $this->equipoRepository->findAllEquipoWithRelations();
            return $equipos;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar los Equipos con relaciones: ' . $e->getMessage());
        }
    }

    public function findEquipoByIdWithRelations(int $id)
    {
        try {
            $equipo = $this->equipoRepository->findEequipoByIdWithRelations($id);
            return $equipo;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el Equipo con relaciones por ID: ' . $e->getMessage());
        }
    }
}
