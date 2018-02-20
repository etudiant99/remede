<?php

namespace medic\PatientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExamenPatient
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="medic\PatientBundle\Entity\ExamenPatientRepository")
 */
class ExamenPatient
{
    /**
     * @ORM\ManyToOne(targetEntity="medic\PatientBundle\Entity\Patient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    /**
     * @ORM\ManyToOne(targetEntity="medic\ExamenBundle\Entity\Examen")
     * @ORM\JoinColumn(nullable=false)
     */
    private $examen;

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
     * @var integer
     *
     * @ORM\Column(name="valeur", type="integer")
     */
    private $valeur;

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
     * Set date
     *
     * @param \DateTime $date
     * @return ExamenPatient
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
     * Set valeur
     *
     * @param integer $valeur
     * @return ExamenPatient
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return integer 
     */
    public function getValeur()
    {
        return $this->valeur;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->date = new \DateTime();
        $this->examen = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set patient
     *
     * @param \medic\PatientBundle\Entity\Patient $patient
     * @return ExamenPatient
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
     * Add examen
     *
     * @param \medic\ExamenBundle\Entity\Examen $examen
     * @return ExamenPatient
     */
    public function addExaman(\medic\ExamenBundle\Entity\Examen $examen)
    {
        $this->examen[] = $examen;

        return $this;
    }

    /**
     * Remove examen
     *
     * @param \medic\ExamenBundle\Entity\Examen $examen
     */
    public function removeExaman(\medic\ExamenBundle\Entity\Examen $examen)
    {
        $this->examen->removeElement($examen);
    }

    /**
     * Get examen
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExamen()
    {
        return $this->examen;
    }

    /**
     * Set examen
     *
     * @param \medic\ExamenBundle\Entity\Examen $examen
     * @return ExamenPatient
     */
    public function setExamen(\medic\ExamenBundle\Entity\Examen $examen)
    {
        $this->examen = $examen;

        return $this;
    }
}
