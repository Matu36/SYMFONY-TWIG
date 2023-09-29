<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\RECOVERRepository;

class RecoverService
{
    private $entityManager;
    private $recoverRepository;

    public function __construct(EntityManagerInterface $entityManager, RECOVERRepository $recoverRepository)
    {
        $this->entityManager = $entityManager;
        $this->recoverRepository = $recoverRepository;
    }

    public function findAllRecoverWithRelations()
    {
        try {
            $recover = $this->recoverRepository->findRecoversWithUserData();
            return $recover;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar los recovers  con relaciones: ' . $e->getMessage());
        }
    }

    public function findRecoverByIdWithRelations(int $id)
    {
        try {
            $recov = $this->recoverRepository->findRecoverByIdWithUserData($id);
            return $recov;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el recover con relaciones por ID: ' . $e->getMessage());
        }
    }
}
