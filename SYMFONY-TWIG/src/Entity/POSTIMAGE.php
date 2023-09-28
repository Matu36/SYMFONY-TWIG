<?php

namespace App\Entity;

use App\Repository\POSTIMAGERepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=POSTIMAGERepository::class)
 * @ORM\Table(name="post_image")
 */
class POSTIMAGE
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
    private $post_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $image_id;

     /**
     * @ORM\ManyToOne(targetEntity=POST::class)
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     */
    private $postPostImage;

    /**
     * @ORM\ManyToOne(targetEntity=IMAGEN::class)
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    private $imagenPostImage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostId(): ?int
    {
        return $this->post_id;
    }

    public function setPostId(?int $post_id): self
    {
        $this->post_id = $post_id;

        return $this;
    }

    public function getImageId(): ?int
    {
        return $this->image_id;
    }

    public function setImageId(?int $image_id): self
    {
        $this->image_id = $image_id;

        return $this;
    }

    public function getpostPostImage(): ?POST
    {
        return $this->postPostImage;
    }

    public function setPostPostImage(?POST $postPostImage): self
    {
        $this->postPostImage = $postPostImage;
        return $this;
    }

    public function getImagenPostImage(): ?IMAGEN
    {
        return $this->imagenPostImage;
    }

    public function setImagenPostImage(?IMAGEN $imagenPostImage): self
    {
        $this->imagenPostImage = $imagenPostImage;
        return $this;
    }
}


// Sirve para relacionar un post con una imagen o mas.

// post_id: Id de la publicación
// image_id: Id de la imagen