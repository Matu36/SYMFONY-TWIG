<?php

namespace App\Entity;

use App\Repository\RECOVERRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RECOVERRepository::class)
 * @ORM\Table(name="recover")
 */
class RECOVER
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */

     
    private $id;
     
     /**
     * @ORM\ManyToOne(targetEntity=USUARIOS::class)
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $usuarioRecover; // Se crea esta propiedad que es la que luego se usa en el repository;
                             // Se hacen los metodos getter y setter

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_id;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $code;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */


    private $usado;

    public function __construct()
    {

        $this->usado = false;
    }

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): self
    {
        $this->user_id = $user_id;

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

    public function isUsado(): ?bool
    {
        return $this->usado;
    }

    public function setUsado(?bool $usado): self
    {
        $this->usado = $usado;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
    public function getUsuarioRecover(): ?USUARIOS
    {
        return $this->usuarioRecover;
    }

    public function setUsuarioRecover(?USUARIOS $usuarioRecover): self
    {
        $this->usuarioRecover = $usuarioRecover;
        return $this;
    }
}


// La tabla recover sirve para almacenar los datos cuando el usuario intenta recuperar su contraseña.

// id: Llave primaria
// user_id: El id del usuario que solicita la recuperación
// code: Codigo generado aleatoriamente
// is_used: Si el codigo ya esta usado, si esta usado ya no se puede user de nuevo
// created_at: Fecha de creación o de solicitud