<?php

namespace App\Controller;

use App\Services\PostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class POSTController extends AbstractController
{

    private $postService;
    private $serializer;

    public function __construct(PostService $postService, SerializerInterface $serializer)
    {
        $this->postService = $postService;
        $this->serializer = $serializer;
    }
    /**
     * @Route("/post", name="post")
     */
    public function GetPost(Request $request): Response
    {
        $post = $this->postService->findAllPostWithRelations();

        $json = $this->serializer->serialize($post, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        return $this->render('post/index.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @Route("/post/{id}", name="post_id")
     */
    public function getPostById(int $id, Request $request): Response
    {
        $post = $this->postService->findPostByIdWithRelations($id);

        $json = $this->serializer->serialize($post, 'json');

        if ($request->headers->get('Accept') === 'application/json') {
            return new JsonResponse($json, 200, [], true);
        }

        if (!$post) {
            throw $this->createNotFoundException('No se encontró el Mensaje con el ID proporcionado');
        }

        return $this->render('post/index.html.twig', [
            'post' => [$post],
        ]);
    }
}