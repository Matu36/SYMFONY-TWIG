<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\LABELRepository;

class LabelService
{
    private $entityManager;
    private $labelRepository;

    public function __construct(EntityManagerInterface $entityManager, LABELRepository $labelRepository)
    {
        $this->entityManager = $entityManager;
        $this->labelRepository = $labelRepository;
    }

    public function findAllLevelWithRelations()
    {
        try {
            $level = $this->labelRepository->findLevelAll();
            return $level;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar los levels con relaciones: ' . $e->getMessage());
        }
    }

    public function findLevelByIdWithRelations(int $id)
    {
        try {
            $lev = $this->labelRepository->findLevelById($id);
            return $lev;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el level con relaciones por ID: ' . $e->getMessage());
        }
    }
}
