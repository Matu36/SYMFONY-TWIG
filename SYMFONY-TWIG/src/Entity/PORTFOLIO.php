<?php

namespace App\Entity;

use App\Repository\PORTFOLIORepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PORTFOLIORepository::class)
 * @ORM\Table(name="portfolio")
 */
class PORTFOLIO
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $cumpleanos;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $genero;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $country_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagen;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagen_cabecera;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $biografia;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $likes;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $dislikes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

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
    private $sentimental_id;

    /**
     * @ORM\ManyToOne(targetEntity=COUNTRY::class)
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $countryPortfolio;

    /**
     * @ORM\ManyToOne(targetEntity=USUARIOS::class)
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $usuariosPortfolio;

    /**
     * @ORM\ManyToOne(targetEntity=SENTIMENTAL::class)
     * @ORM\JoinColumn(name="sentimental_id", referencedColumnName="id")
     */
    private $sentimentalPortfolio;

    /**
     * @ORM\ManyToOne(targetEntity=LABEL::class)
     * @ORM\JoinColumn(name="level_id", referencedColumnName="id")
     */
    private $levelPortfolio;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getcumpleanos(): ?\DateTimeInterface
    {
        return $this->cumpleanos;
    }

    public function setcumpleanos(?\DateTimeInterface $cumpleanos): self
    {
        $this->cumpleanos = $cumpleanos;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(?string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getCountryId(): ?int
    {
        return $this->country_id;
    }

    public function setCountryId(?int $country_id): self
    {
        $this->country_id = $country_id;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getImagenCabecera(): ?string
    {
        return $this->imagen_cabecera;
    }

    public function setImagenCabecera(?string $imagen_cabecera): self
    {
        $this->imagen_cabecera = $imagen_cabecera;

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

    public function getBiografia(): ?string
    {
        return $this->biografia;
    }

    public function setBiografia(?string $biografia): self
    {
        $this->biografia = $biografia;

        return $this;
    }

    public function getLikes(): ?string
    {
        return $this->likes;
    }

    public function setLikes(?string $likes): self
    {
        $this->likes = $likes;

        return $this;
    }

    public function getDislikes(): ?string
    {
        return $this->dislikes;
    }

    public function setDislikes(?string $dislikes): self
    {
        $this->dislikes = $dislikes;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(?string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

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

    public function getSentimentalId(): ?int
    {
        return $this->sentimental_id;
    }

    public function setSentimentalId(?int $sentimental_id): self
    {
        $this->sentimental_id = $sentimental_id;

        return $this;
    }

    public function getCountryPortfolio(): ?COUNTRY
    {
        return $this->countryPortfolio;
    }

    public function setCountryPortfolio(?COUNTRY $countryPortfolio): self
    {
        $this->countryPortfolio = $countryPortfolio;
        return $this;
    }

    public function getUsuariosPortfolio(): ?USUARIOS
    {
        return $this->usuariosPortfolio;
    }

    public function setUsuariosPortfolio(?USUARIOS $usuariosPortfolio): self
    {
        $this->usuariosPortfolio = $usuariosPortfolio;
        return $this;
    }

    public function getSentimentalPortfolio(): ?SENTIMENTAL
    {
        return $this->sentimentalPortfolio;
    }

    public function setSentimentalPortfolio(?SENTIMENTAL $sentimentalPortfolio): self
    {
        $this->sentimentalPortfolio = $sentimentalPortfolio;
        return $this;
    }

    public function getLevelPortfolio(): ?LABEL
    {
        return $this->levelPortfolio;
    }

    public function setLevelPortfolio(?LABEL $levelPortfolio): self
    {
        $this->levelPortfolio = $levelPortfolio;
        return $this;
    }
}




// Almacena información extendida sobre el perfil del usuario.

// day_of_birth: Fecha de nacimiento
// gender: Genero, hombre, mujer, otro, etc..
// country_id: Id del pais desde la tabla “country”
// image: Imagen de perfil
// image_header: Imagen de cabecera
// title: Titulo del perfil
// bio: Descripción o biografia del perfil
// likes: Cosas que te gustan
// dislikes: Cosas que no te gustan
// address: Dirección o domicilio
// phone: Numero de telefono
// public_email: Email publico
// user_id: Id del usuario desde la tabla “user”
// level_id: Quien puede ver tu perfil desde la tabla “level”
// sentimental_id: Situación sentimental desde la tabla “sentimental”