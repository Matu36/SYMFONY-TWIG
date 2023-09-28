<?php

namespace App\Entity;

use App\Repository\CONVERSACIONESRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CONVERSACIONESRepository::class)
 * @ORM\Table(name="conversaciones")
 */
class CONVERSACIONES
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
    private $sender_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $receptor_id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;


    /**
     * @ORM\ManyToOne(targetEntity=USUARIOS::class)
     * @ORM\JoinColumn(name="sender_id", referencedColumnName="id")
     */
    private $usuariosSenderConversation;

    /**
     * @ORM\ManyToOne(targetEntity=USUARIOS::class)
     * @ORM\JoinColumn(name="receptor_id", referencedColumnName="id")
     */
    private $usuariosReceptorConversation;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getReceptorId(): ?int
    {
        return $this->receptor_id;
    }

    public function setReceptorId(?int $receptor_id): self
    {
        $this->receptor_id = $receptor_id;

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
    public function getUsuariosSenderConversation(): ?USUARIOS
    {
        return $this->usuariosSenderConversation;
    }

    public function setUsuariosSenderConversation(?USUARIOS $usuariosSenderConversation): self
    {
        $this->usuariosSenderConversation = $usuariosSenderConversation;
        return $this;
    }
    public function getUsuariosReceptorConversation(): ?USUARIOS
    {
        return $this->usuariosReceptorConversation;
    }

    public function setUsuariosReceptorConversation(?USUARIOS $usuariosReceptorConversation): self
    {
        $this->usuariosReceptorConversation = $usuariosReceptorConversation;
        return $this;
    }
}


// Sirve para crear las conversaciones entre usuarios.

// id: Llave primaria
// sender_id: Usuario que envía la solicitud de conversación
// receptor_id: Usuario que recibe la solicitud
// created_at: Fecha de creación