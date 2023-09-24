<?php

namespace App\Controller;

use App\Entity\USUARIOS;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\USUARIOSType;
use Doctrine\ORM\EntityManagerInterface;


class LandingController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
   
    /**
 * @Route("/registro", name="app_formulario")
 */
public function formulario(Request $request): Response
{
    $formulario = $this->createForm(USUARIOSType::class);

    $formulario->handleRequest($request);

    if ($formulario->isSubmitted() && $formulario->isValid()) {
        $datosFormulario = $formulario->getData();

        // Crear una instancia de la entidad USUARIOS y establecer los valores
        $usuario = new USUARIOS();
        $usuario->setNombre($datosFormulario['nombre']);
        $usuario->setApellido($datosFormulario['apellido']);
        $usuario->setEmail($datosFormulario['email']);
        $usuario->setContrasena($datosFormulario['contrasena']);
        $usuario->setCode(null); 
        $usuario->setActivo(false); 
        $usuario->setAdmin(false); 
        $usuario->setCreatedAd(new \DateTime()); 
    
        // Obtener el Entity Manager y persistir la entidad en la base de datos
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($usuario);
        $entityManager->flush();

        // Redirige a otra página después de procesar el formulario
        return $this->redirectToRoute('app_inicio');
    }

    return $this->render('landing/index.html.twig', [
        'formulario' => $formulario->createView(),
    ]);
}


}
