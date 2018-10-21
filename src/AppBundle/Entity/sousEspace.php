<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * sousEspace
 *
 * @ORM\Table(name="sous_espace")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\sousEspaceRepository")
 */
class sousEspace
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
     * @var int
     *
     * @ORM\Column(name="espace", type="integer")
     */
    private $espace;

    /**
     * @var int
     *
     * @ORM\Column(name="emploi", type="integer")
     */
    private $emploi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duree", type="time")
     */
    private $duree;

    /**
     * @var int
     *
     * @ORM\Column(name="places", type="integer")
     */
    private $places;


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
     * @return sousEspace
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
     * Set espace
     *
     * @param integer $espace
     *
     * @return sousEspace
     */
    public function setEspace($espace)
    {
        $this->espace = $espace;

        return $this;
    }

    /**
     * Get espace
     *
     * @return int
     */
    public function getEspace()
    {
        return $this->espace;
    }

    /**
     * Set emploi
     *
     * @param integer $emploi
     *
     * @return sousEspace
     */
    public function setEmploi($emploi)
    {
        $this->emploi = $emploi;

        return $this;
    }

    /**
     * Get emploi
     *
     * @return int
     */
    public function getEmploi()
    {
        return $this->emploi;
    }

    /**
     * Set duree
     *
     * @param \DateTime $duree
     *
     * @return sousEspace
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return \DateTime
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set places
     *
     * @param integer $places
     *
     * @return sousEspace
     */
    public function setPlaces($places)
    {
        $this->places = $places;

        return $this;
    }

    /**
     * Get places
     *
     * @return int
     */
    public function getPlaces()
    {
        return $this->places;
    }
}

