<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SENTIMENTALController extends AbstractController
{
    /**
     * @Route("/s/e/n/t/i/m/e/n/t/a/l", name="app_s_e_n_t_i_m_e_n_t_a_l")
     */
    public function index(): Response
    {
        return $this->render('sentimental/index.html.twig', [
            'controller_name' => 'SENTIMENTALController',
        ]);
    }
}
