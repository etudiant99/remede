<?php

namespace medic\PatientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SymptomePatient
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="medic\PatientBundle\Entity\SymptomePatientRepository")
 */
class SymptomePatient
{
    /**
     * @ORM\ManyToOne(targetEntity="medic\UserBundle\Entity\User")
     */
    private $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="medic\PatientBundle\Entity\Patient"))
     */
    private $patient;

    /**
     * @ORM\ManyToOne(targetEntity="medic\SymptomeBundle\Entity\Symptome")
     */
    private $symptome;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

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
     * @return SymptomePatient
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
     * Set patient
     *
     * @param \medic\PatientBundle\Entity\Patient $patient
     * @return SymptomePatient
     */
    public function setPatient(\medic\PatientBundle\Entity\Patient $patient)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \medic\PatientBundle\Entity\Patient 
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set symptome
     *
     * @param \medic\SymptomeBundle\Entity\Symptome $symptome
     * @return SymptomePatient
     */
    public function setSymptome(\medic\SymptomeBundle\Entity\Symptome $symptome)
    {
        $this->symptome = $symptome;

        return $this;
    }

    /**
     * Get symptome
     *
     * @return \medic\SymptomeBundle\Entity\Symptome 
     */
    public function getSymptome()
    {
        return $this->symptome;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->date = new \DateTime();
        $this->symptome = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add symptome
     *
     * @param \medic\SymptomeBundle\Entity\Symptome $symptome
     * @return SymptomePatient
     */
    public function addSymptome(\medic\SymptomeBundle\Entity\Symptome $symptome)
    {
        $this->symptome[] = $symptome;

        return $this;
    }

    /**
     * Remove symptome
     *
     * @param \medic\SymptomeBundle\Entity\Symptome $symptome
     */
    public function removeSymptome(\medic\SymptomeBundle\Entity\Symptome $symptome)
    {
        $this->symptome->removeElement($symptome);
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return SymptomePatient
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param \medic\UserBundle\Entity\User $user
     * @return SymptomePatient
     */
    public function setUser(\medic\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \medic\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
