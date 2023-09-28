<?php

namespace App\Entity;

use App\Repository\SENTIMENTALRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SENTIMENTALRepository::class)
 * @ORM\Table(name="sentimental")
 */
class SENTIMENTAL
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


// Almacena los tipos de relaciones o 
// estado de las relaciones: Soltero, casado, divorciado, es complicado …

// d: Llave primaria
// name: Nombre que se muestra