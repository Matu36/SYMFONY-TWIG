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
}
