<?php

namespace medic\MedicamentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Medicament
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="medic\MedicamentBundle\Entity\MedicamentRepository")
 */
class Medicament
{
   /**
    * @Gedmo\Slug(fields={"nom"})
    * @ORM\Column(length=128, unique=true)
   */
   private $slug;

  /**
   * @ORM\ManyToMany(targetEntity="medic\SubstanceBundle\Entity\Substance", cascade={"persist"})
   */
  private $substances;

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
     * @return Medicament
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
     * Constructor
     */
    public function __construct()
    {
        $this->substances = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set slug
     *
     * @param string $slug
     * @return Medicament
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add substances
     *
     * @param \medic\SubstanceBundle\Entity\Substance $substances
     * @return Medicament
     */
    public function addSubstance(\medic\SubstanceBundle\Entity\Substance $substances)
    {
        $this->substances[] = $substances;

        return $this;
    }

    /**
     * Remove substances
     *
     * @param \medic\SubstanceBundle\Entity\Substance $substances
     */
    public function removeSubstance(\medic\SubstanceBundle\Entity\Substance $substances)
    {
        $this->substances->removeElement($substances);
    }

    /**
     * Get substances
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubstances()
    {
        return $this->substances;
    }
}
