<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\NOTIFICACIONESRepository;

class NotificacionesService
{
    private $entityManager;
    private $notificacionesRepository;

    public function __construct(EntityManagerInterface $entityManager, NOTIFICACIONESRepository $notificacionesRepository)
    {
        $this->entityManager = $entityManager;
        $this->notificacionesRepository = $notificacionesRepository;
    }

    public function findAllNotificacioneslWithRelations()
    {
        try {
            $notificaciones = $this->notificacionesRepository->findAllNotificacionesWithRelations();
            return $notificaciones;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar las notificaciones con relaciones: ' . $e->getMessage());
        }
    }

    public function findNotificacionesByIdWithRelations(int $id)
    {
        try {
            $notificacion = $this->notificacionesRepository->findNotificacionesByIdWithRelations($id);
            return $notificacion;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar la notificación con relaciones por ID: ' . $e->getMessage());
        }
    }
}
