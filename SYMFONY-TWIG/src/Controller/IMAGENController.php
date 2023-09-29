<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IMAGENController extends AbstractController
{
    /**
     * @Route("/i/m/a/g/e/n", name="app_i_m_a_g_e_n")
     */
    public function index(): Response
    {
        return $this->render('imagen/index.html.twig', [
            'controller_name' => 'IMAGENController',
        ]);
    }
}
