<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ALBUMRepository;

class AlbumService
{
    private $entityManager;
    private $albumRepository;

    public function __construct(EntityManagerInterface $entityManager, ALBUMRepository $albumRepository)
    {
        $this->entityManager = $entityManager;
        $this->albumRepository = $albumRepository;
    }

    public function findAllAlbumWithRelations()
    {
        try {
            $albums = $this->albumRepository->findAllAlbumWithRelations();
            return $albums;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar los álbumes con relaciones: ' . $e->getMessage());
        }
    }

    public function findAlbumByIdWithRelations(int $id)
    {
        try {
            $album = $this->albumRepository->findAlbumByIdWithRelations($id);
            return $album;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el álbum con relaciones por ID: ' . $e->getMessage());
        }
    }
}
