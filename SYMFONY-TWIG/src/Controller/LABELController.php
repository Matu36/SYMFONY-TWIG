<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LABELController extends AbstractController
{
    /**
     * @Route("/l/a/b/e/l", name="app_l_a_b_e_l")
     */
    public function index(): Response
    {
        return $this->render('label/index.html.twig', [
            'controller_name' => 'LABELController',
        ]);
    }
}
