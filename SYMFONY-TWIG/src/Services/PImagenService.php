<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\POSTIMAGERepository;

class PImagenService
{
    private $entityManager;
    private $postImageRepository;

    public function __construct(EntityManagerInterface $entityManager, POSTIMAGERepository $postImageRepository)
    {
        $this->entityManager = $entityManager;
        $this->postImageRepository = $postImageRepository;
    }

    public function findAllPostImageWithRelations()
    {
        try {
            $postImagen = $this->postImageRepository->findAllPostImageWithRelations();
            return $postImagen;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar las Post Imagenes con relaciones: ' . $e->getMessage());
        }
    }

    public function findPostImageByIdWithRelations(int $id)
    {
        try {
            $postI = $this->postImageRepository->findPostImageByIdWithRelations($id);
            return $postI;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar la Post Imagen con relaciones por ID: ' . $e->getMessage());
        }
    }
}