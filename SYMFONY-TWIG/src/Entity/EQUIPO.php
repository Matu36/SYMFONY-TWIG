<?php

namespace App\Entity;

use App\Repository\EQUIPORepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EQUIPORepository::class)
 * @ORM\Table(name="equipo")
 */
class EQUIPO
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_id;

    /**
     * @ORM\Column(type="integer", options={"default"=1, "comment"="1.- open, 2.- closed"}, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

     /**
     * @ORM\ManyToOne(targetEntity=USUARIOS::class)
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $usuariosEquipo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
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

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): self
    {
        $this->status = $status;

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

    public function getUsuariosEquipo(): ?USUARIOS
    {
        return $this->usuariosEquipo;
    }

    public function setUsuariosEquipo(?USUARIOS $usuariosEquipo): self
    {
        $this->usuariosEquipo = $usuariosEquipo;
        return $this;
    }
}


// Sirve para crear grupos y compartir información. No se puede usar la palabra “group” por que esta reservada por MySQL.

// d: Llave primaria
// image: Imagen del grupo
// title: Titulo del grupo
// description: Descripcion del grupo
// user_id: Propietario del grupo
// status: Estado del grupo
// created_at: fecha de creación