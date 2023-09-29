<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MENSAJESController extends AbstractController
{
    /**
     * @Route("/m/e/n/s/a/j/e/s", name="app_m_e_n_s_a_j_e_s")
     */
    public function index(): Response
    {
        return $this->render('mensajes/index.html.twig', [
            'controller_name' => 'MENSAJESController',
        ]);
    }
}
