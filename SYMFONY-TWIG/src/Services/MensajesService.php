<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\MENSAJESRepository;

class MensajesService
{
    private $entityManager;
    private $mensajesRepository;

    public function __construct(EntityManagerInterface $entityManager, MENSAJESRepository $mensajesRepository)
    {
        $this->entityManager = $entityManager;
        $this->mensajesRepository = $mensajesRepository;
    }

    public function findAlMensajesWithRelations()
    {
        try {
            $mensajes = $this->mensajesRepository->findAllMensajesWithRelations();
            return $mensajes;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar los Mensajes con relaciones: ' . $e->getMessage());
        }
    }

    public function findMensajesByIdWithRelations(int $id)
    {
        try {
            $mensaje = $this->mensajesRepository->findMensajeByIdWithRelations($id);
            return $mensaje;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el Mensaje con relaciones por ID: ' . $e->getMessage());
        }
    }
}
