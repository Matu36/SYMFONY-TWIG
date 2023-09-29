<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\COUNTRYRepository;

class CountryService
{
    private $entityManager;
    private $countryRepository;

    public function __construct(EntityManagerInterface $entityManager, COUNTRYRepository $countryRepository)
    {
        $this->entityManager = $entityManager;
        $this->countryRepository = $countryRepository;
    }

    public function findAllCountryWithRelations()
    {
        try {
            $countrys = $this->countryRepository->findCountryAll();
            return $countrys;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar los Paises con relaciones: ' . $e->getMessage());
        }
    }

    public function findCountryByIdWithRelations(int $id)
    {
        try {
            $country = $this->countryRepository->findCountrylById($id);
            return $country;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el Pais con relaciones por ID: ' . $e->getMessage());
        }
    }
}