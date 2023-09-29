<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\IMAGENRepository;

class ImagenService
{
    private $entityManager;
    private $imagenRepository;

    public function __construct(EntityManagerInterface $entityManager, IMAGENRepository $imagenRepository)
    {
        $this->entityManager = $entityManager;
        $this->imagenRepository = $imagenRepository;
    }

    public function findAllImagenWithRelations()
    {
        try {
            $imagen = $this->imagenRepository->findAllImagenWithRelations();
            return $imagen;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar las imagenes con relaciones: ' . $e->getMessage());
        }
    }

    public function findImagenByIdWithRelations(int $id)
    {
        try {
            $imag = $this->imagenRepository->findImagenByIdWithRelations($id);
            return $imag;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar la imagen con relaciones por ID: ' . $e->getMessage());
        }
    }
}
