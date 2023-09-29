<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class POSTIMAGENController extends AbstractController
{
    /**
     * @Route("/p/o/s/t/i/m/a/g/e/n", name="app_p_o_s_t_i_m_a_g_e_n")
     */
    public function index(): Response
    {
        return $this->render('postimagen/index.html.twig', [
            'controller_name' => 'POSTIMAGENController',
        ]);
    }
}
