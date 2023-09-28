<?php

namespace App\Entity;

use App\Repository\IMAGENRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IMAGENRepository::class)
 * @ORM\Table(name="imagen")
 */
class IMAGEN
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $src;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $contenido;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $level_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $album_id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;


    /**
     * @ORM\ManyToOne(targetEntity=ALBUM::class)
     * @ORM\JoinColumn(name="album_id", referencedColumnName="id")
     */
    private $albumImagen;

    /**
     * @ORM\ManyToOne(targetEntity=USUARIOS::class)
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $usuariosImagen;

    /**
     * @ORM\ManyToOne(targetEntity=LABEL::class)
     * @ORM\JoinColumn(name="level_id", referencedColumnName="id")
     */
    private $levelImagen;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSrc(): ?string
    {
        return $this->src;
    }

    public function setSrc(?string $src): self
    {
        $this->src = $src;

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

    public function getLevelId(): ?int
    {
        return $this->level_id;
    }

    public function setLevelId(?int $level_id): self
    {
        $this->level_id = $level_id;

        return $this;
    }

    public function getAlbumId(): ?int
    {
        return $this->album_id;
    }

    public function setAlbumId(?int $album_id): self
    {
        $this->album_id = $album_id;

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

    public function getUsuariosImagen(): ?USUARIOS
    {
        return $this->usuariosImagen;
    }

    public function setUsuariosImagen(?USUARIOS $usuariosImagen): self
    {
        $this->usuariosImagen = $usuariosImagen;
        return $this;
    }

    public function getLevelImagen(): ?LABEL
    {
        return $this->levelImagen;
    }

    public function setLevelImagen(?LABEL $levelImagen): self
    {
        $this->levelImagen = $levelImagen;
        return $this;
    }
    public function getAlbumImagen(): ?ALBUM
    {
        return $this->albumImagen;
    }

    public function setAlbumImagen(?ALBUM $albumImagen): self
    {
        $this->albumImagen = $albumImagen;
        return $this;
    }
}


// Sirve para guardar las imágenes  y su información.

// id: Llave primaria
// src: Nombre del archivo de imagen
// title: Titulo de la imagen
// content: Descripción de la imagen
// user_id: Id del usuario propietario de la imagen
// level_id: quien puede ver la imagen
// album_id: Si la imagen pertenece a un album, se guarda el id del album.
// created_at: Fecha de creación