<?php

namespace App\Controller;

use App\Entity\USUARIOS;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\USUARIOSType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


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
    public function formulario(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $formulario = $this->createForm(USUARIOSType::class);

        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()) {
            $datosFormulario = $formulario->getData();

            // Verificar si el correo electrónico ya existe en la base de datos
            $existingUser = $this->getDoctrine()
                ->getRepository(USUARIOS::class)
                ->findOneBy(['email' => $datosFormulario['email']]);

            // Crear una instancia de la entidad USUARIOS y establecer los valores
            if ($existingUser) {
                // Agregar un error al formulario
                $formulario->get('email')->addError(new FormError('Este correo electrónico ya está en uso.'));
            } else {
                // Crear y persistir el nuevo usuario
                $usuario = new USUARIOS();
                $usuario->setNombre($datosFormulario['nombre']);
                $usuario->setApellido($datosFormulario['apellido']);
                $usuario->setEmail($datosFormulario['email']);
                $hashedPassword = $passwordEncoder->encodePassword($usuario, $datosFormulario['contrasena']);
                $usuario->setContrasena($hashedPassword);
                $usuario->setCode(null);
                $usuario->setActivo(false);
                $usuario->setAdmin(false);
                $usuario->setCreatedAd(new \DateTime());

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($usuario);
                $entityManager->flush();

                // Redirige a otra página después de procesar el formulario
                return $this->redirectToRoute('app_inicio');
            }
        }

        return $this->render('landing/index.html.twig', [
            'formulario' => $formulario->createView(),
        ]);
    }

}