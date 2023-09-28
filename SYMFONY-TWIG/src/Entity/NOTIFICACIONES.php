<?php

namespace App\Entity;

use App\Repository\NOTIFICACIONESRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NOTIFICACIONESRepository::class)
 * @ORM\Table(name="notificaciones")
 
 */
class NOTIFICACIONES
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
    private $not_type_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $type_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ref_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $receptor_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sender_id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_readed;

    /**
     * @ORM\ManyToOne(targetEntity=USUARIOS::class)
     * @ORM\JoinColumn(name="sender_id", referencedColumnName="id")
     */
    private $usuariosSenderNotificacion;

    /**
     * @ORM\ManyToOne(targetEntity=USUARIOS::class)
     * @ORM\JoinColumn(name="receptor_id", referencedColumnName="id")
     */
    private $usuariosReceptorNotificacion;

    public function __construct()
    {
        $this->is_readed = false;
    }

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNotTypeId(): ?int
    {
        return $this->not_type_id;
    }

    public function setNotTypeId(?int $not_type_id): self
    {
        $this->not_type_id = $not_type_id;

        return $this;
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

    public function getReceptorId(): ?int
    {
        return $this->receptor_id;
    }

    public function setReceptorId(?int $receptor_id): self
    {
        $this->receptor_id = $receptor_id;

        return $this;
    }

    public function getSenderId(): ?int
    {
        return $this->sender_id;
    }

    public function setSenderId(?int $sender_id): self
    {
        $this->sender_id = $sender_id;

        return $this;
    }

    public function isIsReaded(): ?bool
    {
        return $this->is_readed;
    }

    public function setIsReaded(?bool $is_readed): self
    {
        $this->is_readed = $is_readed;

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

    public function getUsuariosSenderNotificacion(): ?USUARIOS
    {
        return $this->usuariosSenderNotificacion;
    }

    public function setUsuariosSenderNotificacion(?USUARIOS $usuariosSenderNotificacion): self
    {
        $this->usuariosSenderNotificacion = $usuariosSenderNotificacion;
        return $this;
    }

    public function getUsuariosReceptorNotificacion(): ?USUARIOS
    {
        return $this->usuariosReceptorNotificacion;
    }

    public function setUsuariosReceptorNotificacion(?USUARIOS $usuariosReceptorNotificacion): self
    {
        $this->usuariosReceptorNotificacion = $usuariosReceptorNotificacion;
        return $this;
    }
}


// Sirve para las notificaciones.

// id: Llave primaria de la tabla
// not_type_id: Tipo de la notificación: me gusta, comentario…
// type_id: Tipo de contenido que activa la notificación: publicación, imagen, album, etc.
// ref_id: Id del contenido que activa la notificación
// receptor_id: Usuario que va a recibir la notificación
// sender_id: Usuario que activa la notificación
// is_readed: Si ya fue leída la notificación
// created_at: Fecha de creación de la notificación