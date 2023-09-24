<?php

namespace App\Entity;

use App\Repository\USUARIOSRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=USUARIOSRepository::class)
 * @ORM\Table(name="usuarios")
 */

class USUARIOS
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
