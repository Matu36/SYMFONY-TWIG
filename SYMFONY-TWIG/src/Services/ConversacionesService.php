<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CONVERSACIONESRepository;

class ConversacionesService
{
    private $entityManager;
    private $conversacionesRepository;

    public function __construct(EntityManagerInterface $entityManager, CONVERSACIONESRepository $conversacionesRepository)
    {
        $this->entityManager = $entityManager;
        $this->conversacionesRepository = $conversacionesRepository;
    }

    public function findAllConversacionesWithRelations()
    {
        try {
            $conversaciones = $this->conversacionesRepository->findAllConversacionWithRelations();
            return $conversaciones;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar las conversaciones con relaciones: ' . $e->getMessage());
        }
    }

    public function findConversacionesByIdWithRelations(int $id)
    {
        try {
            $conversacion = $this->conversacionesRepository->findConversacionByIdWithRelations($id);
            return $conversacion;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar la Conversacion con relaciones por ID: ' . $e->getMessage());
        }
    }
}