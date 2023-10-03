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
use App\Form\LoginFormType;


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

/**
 * @Route("/login", name="app_login")
 */
public function login(Request $request, AuthenticationUtils $authenticationUtils, UserPasswordEncoderInterface $passwordEncoder)
{
    $form = $this->createForm(LoginFormType::class);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Obtén los datos del formulario
        $formData = $form->getData();

        // Implementa la lógica de autenticación para verificar las credenciales en la base de datos
        // Ejemplo: consulta la base de datos para verificar si el usuario y la contraseña coinciden
        $user = $this->getDoctrine()
            ->getRepository(USUARIOS::class)
            ->findOneBy(['email' => $formData->getEmail()]);

        if (!$user || !$this->$passwordEncoder->isPasswordValid($user, $formData->getPassword())) {
            // Si las credenciales no son válidas, muestra un mensaje de error
            $this->addFlash('error', 'Credenciales incorrectas');
        } else {
            // Autenticar al usuario
            $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
            $this->tokenStorage->setToken($token);
            $this->session->set('_security_main', serialize($token));
            
            // Redirige al usuario a la página deseada
            return $this->redirectToRoute('app_muro');
        }
    }

    return $this->render('landing/index.html.twig', [
        'form' => $form->createView(),
        'error' => $authenticationUtils->getLastAuthenticationError(),
    ]);
}

}