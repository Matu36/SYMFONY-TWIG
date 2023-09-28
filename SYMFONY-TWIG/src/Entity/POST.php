<?php

namespace App\Entity;

use App\Repository\POSTRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=POSTRepository::class)
 * @ORM\Table(name="post")
 */
class POST
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $titulo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenido;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lng;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $start_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $finish_at;

    /**
     * @ORM\Column(type="integer", options={"default"=1, "comment"="1.- user, 2.- group"}, nullable=true)
     */
    private $receptor_type_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $author_ref_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $level_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $post_type_id;

    public function __construct()
    {
        $this->post_type_id = false; 
      
    }

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=LABEL::class)
     * @ORM\JoinColumn(name="level_id", referencedColumnName="id")
     */
    
    private $levelPost;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(?float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(?float $lng): self
    {
        $this->lng = $lng;

        return $this;
    }

    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->start_at;
    }

    public function setStartAt(?\DateTimeInterface $start_at): self
    {
        $this->start_at = $start_at;

        return $this;
    }

    public function getFinishAt(): ?\DateTimeInterface
    {
        return $this->finish_at;
    }

    public function setFinishAt(?\DateTimeInterface $finish_at): self
    {
        $this->finish_at = $finish_at;

        return $this;
    }

    public function getReceptorTypeId(): ?int
    {
        return $this->receptor_type_id;
    }

    public function setReceptorTypeId(?int $receptor_type_id): self
    {
        $this->receptor_type_id = $receptor_type_id;

        return $this;
    }

    public function getAuthorRefId(): ?int
    {
        return $this->author_ref_id;
    }

    public function setAuthorRefId(?int $author_ref_id): self
    {
        $this->author_ref_id = $author_ref_id;

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

    public function getPostTypeId(): ?int
    {
        return $this->post_type_id;
    }

    public function setPostTypeId(?int $post_type_id): self
    {
        $this->post_type_id = $post_type_id;

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
    public function getLevelPost(): ?LABEL
    {
        return $this->levelPost;
    }

    public function setLevelPost(?LABEL $levelPost): self
    {
        $this->levelPost = $levelPost;
        return $this;
    }
}


// Sirve para guardar las publicaciones o cambios de estado del usuario, también eventos y publicaciones para amigos.

// id: Identificador, llave primaria auto incremental
// title: Titulo de la publicación
// content: Contenido de la publicación
// lat: Coordenada latitud para la ubicación
// lng: Coordenada longitud para la ubicación
// start_at: Fecha de inicio
// finish_at: Fecha de fin
// receptor_type_id: Donde se publica en el usuario, un rupo, una pagina, etc…
// author_ref_id: El id del usuario que publica
// receptor_ref_id: El id del usuario que recibe la publicación
// level_id: Nivel de quien puede ver la publicación
// post_type: Tipo de publicación puede ser estatus, evento, etc.
// created_at: Fecha de creación