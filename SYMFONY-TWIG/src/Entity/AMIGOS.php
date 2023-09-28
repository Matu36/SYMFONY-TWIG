<?php

namespace App\Entity;

use App\Repository\AMIGOSRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AMIGOSRepository::class)
 * @ORM\Table(name="amigos")
 */
class AMIGOS
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_accepted;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_readed;

    public function __construct()
    {
        $this->is_accepted = false;
        $this->is_readed = false;
    }

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=USUARIOS::class)
     * @ORM\JoinColumn(name="sender_id", referencedColumnName="id")
     */
    private $usuariosSenderAmigos;

    /**
     * @ORM\ManyToOne(targetEntity=USUARIOS::class)
     * @ORM\JoinColumn(name="receptor_id", referencedColumnName="id")
     */
    private $usuariosReceptorAmigos;

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

    public function isIsAccepted(): ?bool
    {
        return $this->is_accepted;
    }

    public function setIsAccepted(?bool $is_accepted): self
    {
        $this->is_accepted = $is_accepted;

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

    public function getUsuariosSenderAmigos(): ?USUARIOS
    {
        return $this->usuariosSenderAmigos;
    }

    public function setUsuariosSenderAmigos(?USUARIOS $usuariosSenderAmigos): self
    {
        $this->usuariosSenderAmigos = $usuariosSenderAmigos;
        return $this;
    }

    public function getUsuariosReceptorAmigos(): ?USUARIOS
    {
        return $this->usuariosReceptorAmigos;
    }

    public function setUsuariosReceptorAmigos(?USUARIOS $usuariosReceptorAmigos): self
    {
        $this->usuariosReceptorAmigos = $usuariosReceptorAmigos;
        return $this;
    }
}


// Sirve para guardar las solicitudes de amistad y amigos.

// id: Llave primaria
// sender_id: Usuario que envía la solicitud de amistad
// receptor_id: Usuario que recibe la solicitud
// is_accepted: Una vez que el usuario acepta entonces ya son amigos
// is_readed: Si el usuario que recibe lee la solicitud
// created_at: Fecha de creacion