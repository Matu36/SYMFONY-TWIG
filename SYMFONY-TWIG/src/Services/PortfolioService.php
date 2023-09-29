<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PORTFOLIORepository;

class PortfolioService
{
    private $entityManager;
    private $portfolioRepository;

    public function __construct(EntityManagerInterface $entityManager, PORTFOLIORepository $portfolioRepository)
    {
        $this->entityManager = $entityManager;
        $this->portfolioRepository = $portfolioRepository;
    }

    public function findAllPortfoliosWithRelations()
    {
        try {
            $portfolio = $this->portfolioRepository->findAllPortfoliosWithRelations();
            return $portfolio;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar los Portfolios con relaciones: ' . $e->getMessage());
        }
    }

    public function findPortfolioByIdWithRelations(int $id)
    {
        try {
            $portf = $this->portfolioRepository->findPortfolioByIdWithRelations($id);
            return $portf;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el portfolio con relaciones por ID: ' . $e->getMessage());
        }
    }
}