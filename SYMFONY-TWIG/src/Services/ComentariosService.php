<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\COMENTARIOSRepository;

class ComentariosService
{
    private $entityManager;
    private $comentariosRepository;

    public function __construct(EntityManagerInterface $entityManager, COMENTARIOSRepository $comentariosRepository)
    {
        $this->entityManager = $entityManager;
        $this->comentariosRepository = $comentariosRepository;
    }

    public function findAllComentariosWithRelations()
    {
        try {
            $comentarios = $this->comentariosRepository->findAllCorazonWithRelations();
            return $comentarios;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar los Comentarios con relaciones: ' . $e->getMessage());
        }
    }

    public function findComentariosByIdWithRelations(int $id)
    {
        try {
            $comentario = $this->comentariosRepository->findCorazonByIdWithRelations($id);
            return $comentario;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el Comentarios con relaciones por ID: ' . $e->getMessage());
        }
    }
}
