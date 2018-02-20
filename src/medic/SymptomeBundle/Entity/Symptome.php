<?php

namespace medic\SymptomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Symptome
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="medic\SymptomeBundle\Entity\SymptomeRepository")
 */
class Symptome
{
    /**
     * @ORM\ManyToMany(targetEntity="medic\SymptomeBundle\Entity\Questionnaire", cascade={"persist"})
     */
    private $questionnaire;

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
     * @return Symptome
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
        $this->questionnaire = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add questionnaire
     *
     * @param \medic\SymptomeBundle\Entity\Questionnaire $questionnaire
     * @return Symptome
     */
    public function addQuestionnaire(\medic\SymptomeBundle\Entity\Questionnaire $questionnaire)
    {
        $this->questionnaire[] = $questionnaire;

        return $this;
    }

    /**
     * Remove questionnaire
     *
     * @param \medic\SymptomeBundle\Entity\Questionnaire $questionnaire
     */
    public function removeQuestionnaire(\medic\SymptomeBundle\Entity\Questionnaire $questionnaire)
    {
        $this->questionnaire->removeElement($questionnaire);
    }

    /**
     * Get questionnaire
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestionnaire()
    {
        return $this->questionnaire;
    }
}
