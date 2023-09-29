<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NOTIFICACIONESController extends AbstractController
{
    /**
     * @Route("/n/o/t/i/f/i/c/a/c/i/o/n/e/s", name="app_n_o_t_i_f_i_c_a_c_i_o_n_e_s")
     */
    public function index(): Response
    {
        return $this->render('notificaciones/index.html.twig', [
            'controller_name' => 'NOTIFICACIONESController',
        ]);
    }
}
