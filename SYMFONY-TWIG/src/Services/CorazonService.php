<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CORAZONRepository;

class CorazonService
{
    private $entityManager;
    private $corazonRepository;

    public function __construct(EntityManagerInterface $entityManager, CORAZONRepository $corazonRepository)
    {
        $this->entityManager = $entityManager;
        $this->corazonRepository = $corazonRepository;
    }

    public function findAllCorazonWithRelations()
    {
        try {
            $corazones = $this->corazonRepository->findAllCorazonWithRelations();
            return $corazones;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar los Corazones con relaciones: ' . $e->getMessage());
        }
    }

    public function findCorazonByIdWithRelations(int $id)
    {
        try {
            $corazon = $this->corazonRepository->findCorazonByIdWithRelations($id);
            return $corazon;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el Corazón con relaciones por ID: ' . $e->getMessage());
        }
    }
}
