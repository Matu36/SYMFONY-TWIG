<?php

namespace App\Entity;

use App\Repository\MENSAJESRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MENSAJESRepository::class)
 * @ORM\Table(name="mensajes")
 */
class MENSAJES
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenido;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $conversacion_id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_readed;

    /**
     * @ORM\ManyToOne(targetEntity=USUARIOS::class)
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $usuariosMensajes;

    /**
     * @ORM\ManyToOne(targetEntity=CONVERSACIONES::class)
     * @ORM\JoinColumn(name="conversacion_id", referencedColumnName="id")
     */
    private $conversacionMensajes;


    public function __construct()
    {
        $this->is_readed = false; 
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(?string $contenido): self
    {
        $this->contenido = $contenido;

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

    public function getConversacionId(): ?int
    {
        return $this->conversacion_id;
    }

    public function setConversacionId(?int $conversacion_id): self
    {
        $this->conversacion_id = $conversacion_id;

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

    public function isIsReaded(): ?bool
    {
        return $this->is_readed;
    }

    public function setIsReaded(?bool $is_readed): self
    {
        $this->is_readed = $is_readed;

        return $this;
    }

    public function getUsuariosMensajes(): ?USUARIOS
    {
        return $this->usuariosMensajes;
    }

    public function setUsuariosMensajes(?USUARIOS $usuariosMensajes): self
    {
        $this->usuariosMensajes = $usuariosMensajes;
        return $this;
    }

    public function getConversacionMensajes(): ?CONVERSACIONES
    {
        return $this->conversacionMensajes;
    }

    public function setConversacionMensajes(?CONVERSACIONES $conversacionMensajes): self
    {
        $this->conversacionMensajes = $conversacionMensajes;
        return $this;
    }
}


// Sirve para guardar los mensajes de las conversaciones entre usuarios.

// id: Lllave primaria de la tabla
// content: contenido del mensaje
// user_id: Usuario que envía el mensaje
// conversation_id: Id de la conversación
// created_at: Fecha de creación
// is_readed: Si el mensaje ya fue leído por el otro usuario