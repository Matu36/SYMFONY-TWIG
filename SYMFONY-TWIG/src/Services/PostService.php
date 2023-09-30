<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\POSTRepository;

class PostService
{
    private $entityManager;
    private $postRepository;

    public function __construct(EntityManagerInterface $entityManager, POSTRepository $postRepository)
    {
        $this->entityManager = $entityManager;
        $this->postRepository = $postRepository;
    }

    public function findAllPostWithRelations()
    {
        try {
            $post = $this->postRepository->findAllPostWithRelations();
            return $post;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar los Posteos  con relaciones: ' . $e->getMessage());
        }
    }

    public function findPostByIdWithRelations(int $id)
    {
        try {
            $pos = $this->postRepository->findPostByIdWithRelations($id);
            return $pos;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el posteo con relaciones por ID: ' . $e->getMessage());
        }
    }
}