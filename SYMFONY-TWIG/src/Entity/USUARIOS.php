<?php

namespace App\Entity;

use App\Repository\USUARIOSRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=USUARIOSRepository::class)
 * @ORM\Table(name="usuarios")
 */

class USUARIOS implements UserInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $apellido;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Unique
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $contrasena;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $code;

    /**
     * @ORM\Column(type="boolean")
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $activo;

    /**
     * @ORM\Column(type="boolean")
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $admin;
   
    public function __construct()
    {
        $this->activo = false; 
        $this->admin = false; 
    }

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_ad;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getContrasena(): ?string
    {
        return $this->contrasena;
    }

    public function setContrasena(string $contrasena): self
    {
        $this->contrasena = $contrasena;

        return $this;
    }
    public function getRoles()
    {
        // Define los roles del usuario, por ejemplo, ["ROLE_USER"]
        // Esto es necesario para la interfaz UserInterface, 
        // pero debes adaptarlo a tu lógica de roles
    }

    public function getPassword()
    {
        // Devuelve la contraseña hasheada
        return $this->contrasena;
    }

    public function getSalt()
    {
        // Puedes dejar esto en blanco o implementarlo si es necesario
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function eraseCredentials()
    {
        // Puedes dejar esto en blanco
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function isActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function isAdmin(): ?bool
    {
        return $this->admin;
    }

    public function setAdmin(bool $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function getCreatedAd(): ?\DateTimeInterface
    {
        return $this->created_ad;
    }

    public function setCreatedAd(\DateTimeInterface $created_ad): self
    {
        $this->created_ad = $created_ad;

        return $this;
    }
}


// La tabla user es la tabla principal del sistema, ya que cada usuario corresponde una cuenta y todos las las acciones 
// se relacionan con el usuario desde publicar, comentar, hasta las notificaciones, etc..

// id: es la llave primaria auto incremental de la tabla (La mayoría de las tablas incluyen su ID para ser relacionadas con otras tablas)
// name: Nombre real del usuario
// lastname: Apellidos del usuario
// username: Nombre de usuario para inciar sesión
// email: Correo para iniciar sesión y para recibir notificaciones
// password: Contraseña
// code: Código de recuperación
// is_active: Si el usuario esta activo
// is_admin: Si el usuario es administrador
// created_at: Fecha de creación automática por el sistema.
