<?php

namespace medic\ExamenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Examen
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="medic\ExamenBundle\Entity\ExamenRepository")
 */
class Examen
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="normeMin", type="integer")
     */
    private $normeMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="normeMax", type="integer")
     */
    private $normeMax;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Examen
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
     * Set normeMin
     *
     * @param integer $normeMin
     * @return Examen
     */
    public function setNormeMin($normeMin)
    {
        $this->normeMin = $normeMin;

        return $this;
    }

    /**
     * Get normeMin
     *
     * @return integer 
     */
    public function getNormeMin()
    {
        return $this->normeMin;
    }

    /**
     * Set normeMax
     *
     * @param integer $normeMax
     * @return Examen
     */
    public function setNormeMax($normeMax)
    {
        $this->normeMax = $normeMax;

        return $this;
    }

    /**
     * Get normeMax
     *
     * @return integer 
     */
    public function getNormeMax()
    {
        return $this->normeMax;
    }
}
