<?php

namespace App\Entity;

use App\Repository\LABELRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LABELRepository::class)
 * @ORM\Table(name="level")
 */
class LABEL
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nombre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }
}




// La tabla level sirve para guardar los 
// niveles de distribución de las publicaciones, por ejemplo las publicaciones publicas 
// las pueden ver todos aunque no sean amigos, Amigos: solo mis amigos, Amigos de mis amigos…

// id: Llave primaria
// name: Nombre o texto