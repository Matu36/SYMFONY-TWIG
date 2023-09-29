<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class POSTController extends AbstractController
{
    /**
     * @Route("/p/o/s/t", name="app_p_o_s_t")
     */
    public function index(): Response
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'POSTController',
        ]);
    }
}
