<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Espace
 *
 * @ORM\Table(name="espace")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EspaceRepository")
 */
class Espace
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=56)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="adresse", type="integer")
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=45)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=45)
     */
    private $latitude;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="listeActivite", type="object")
     */
    private $listeActivite;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Espace
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Espace
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set adresse
     *
     * @param int $adresse
     *
     * @return Espace
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return int
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Espace
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Espace
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set listeActivite
     *
     * @param \stdClass $listeActivite
     *
     * @return Espace
     */
    public function setListeActivite($listeActivite)
    {
        $this->listeActivite = $listeActivite;

        return $this;
    }

    /**
     * Get listeActivite
     *
     * @return \stdClass
     */
    public function getListeActivite()
    {
        return $this->listeActivite;
    }
}

