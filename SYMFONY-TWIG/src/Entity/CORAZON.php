<?php

namespace App\Entity;

use App\Repository\CORAZONRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CORAZONRepository::class)
 * @ORM\Table(name="corazon")
 */
class CORAZON
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $type_id;



    public function __construct()
    {
        $this->type_id = false; 
    }

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ref_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=USUARIOS::class)
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $usuariosCorazon;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeId(): ?int
    {
        return $this->type_id;
    }

    public function setTypeId(?int $type_id): self
    {
        $this->type_id = $type_id;

        return $this;
    }

    public function getRefId(): ?int
    {
        return $this->ref_id;
    }

    public function setRefId(?int $ref_id): self
    {
        $this->ref_id = $ref_id;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUsuariosCorazon(): ?USUARIOS
    {
        return $this->usuariosCorazon;
    }

    public function setUsuariosCorazon(?USUARIOS $usuariosCorazon): self
    {
        $this->usuariosCorazon = $usuariosCorazon;
        return $this;
    }
}


// Sirve para guardar los “Me gusta” de las publicaciones. No se pude usar la palabra “like” para el nombre de la tabla por que “like” es un comando SQL.

// id: Llave primaria
// type_id: Tipo, si es para posts, imágenes, albums etc.
// ref_id: El id del del post, imagen o album segun el caso.
// user_id: El id del usuario que crea el “me gusta”
// created_at: Fecha de creación de el “me gusta”

