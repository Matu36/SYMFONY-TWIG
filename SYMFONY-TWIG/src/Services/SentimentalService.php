<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\SENTIMENTALRepository;

class SentimentalService
{
    private $entityManager;
    private $sentimentalRepository;

    public function __construct(EntityManagerInterface $entityManager, SENTIMENTALRepository $sentimentalRepository)
    {
        $this->entityManager = $entityManager;
        $this->sentimentalRepository = $sentimentalRepository;
    }

    public function findAllSentimentalWithRelations()
    {
        try {
            $sentimental = $this->sentimentalRepository->findSentimentalAll();
            return $sentimental;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar los sentimentales  con relaciones: ' . $e->getMessage());
        }
    }

    public function findSentimentalByIdWithRelations(int $id)
    {
        try {
            $sentim = $this->sentimentalRepository->findSentimentalById($id);
            return $sentim;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el sentimental con relaciones por ID: ' . $e->getMessage());
        }
    }
}
