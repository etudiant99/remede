<?php

namespace medic\PatientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="medic\PatientBundle\Entity\PatientRepository")
 */
class Patient
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
     * @ORM\Column(name="NAM", type="string", length=255, nullable=true)
     */
    private $nam;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    
    public function getPrenomNom()
    {
        return $this->prenom.' '.$this->nom;
    }
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var integer
     *
     * @ORM\Column(name="poids", type="float", nullable=true)
     */
    private $poids;

    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="float", nullable=true)
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="medecinTraitant", type="string", length=255, nullable=true)
     */
    private $medecinTraitant;

    /**
     * @var string
     *
     * @ORM\Column(name="medecinFamille", type="string", length=255, nullable=true)
     */
    private $medecinFamille;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @var array
     *
     * @ORM\Column(name="antecedent", type="array", nullable=true)
     */
    private $antecedent;

    /**
     * @var array
     *
     * @ORM\Column(name="allergie", type="array", nullable=true)
     */
    private $allergie;

    /**
     * @var array
     *
     * @ORM\Column(name="traitementCours", type="array", nullable=true)
     */
    private $traitementCours;


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
     * Set nam
     *
     * @param string $nam
     * @return Patient
     */
    public function setNam($nam)
    {
        $this->nam = $nam;

        return $this;
    }

    /**
     * Get nam
     *
     * @return string 
     */
    public function getNam()
    {
        return $this->nam;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Patient
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Patient
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
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Patient
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set poids
     *
     * @param float $poids
     * @return Patient
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return float 
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set taille
     *
     * @param float $taille
     * @return Patient
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return float 
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set medecinTraitant
     *
     * @param string $medecinTraitant
     * @return Patient
     */
    public function setMedecinTraitant($medecinTraitant)
    {
        $this->medecinTraitant = $medecinTraitant;

        return $this;
    }

    /**
     * Get medecinTraitant
     *
     * @return string 
     */
    public function getMedecinTraitant()
    {
        return $this->medecinTraitant;
    }

    /**
     * Set medecinFamille
     *
     * @param string $medecinFamille
     * @return Patient
     */
    public function setMedecinFamille($medecinFamille)
    {
        $this->medecinFamille = $medecinFamille;

        return $this;
    }

    /**
     * Get medecinFamille
     *
     * @return string 
     */
    public function getMedecinFamille()
    {
        return $this->medecinFamille;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Patient
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Patient
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set allergie
     *
     * @param array $allergie
     * @return Patient
     */
    public function setAllergie($allergie)
    {
        $this->allergie = $allergie;

        return $this;
    }

    /**
     * Get allergie
     *
     * @return array 
     */
    public function getAllergie()
    {
        return $this->allergie;
    }

    /**
     * Set traitementCours
     *
     * @param array $traitementCours
     * @return Patient
     */
    public function setTraitementCours($traitementCours)
    {
        $this->traitementCours = $traitementCours;

        return $this;
    }

    /**
     * Get traitementCours
     *
     * @return array 
     */
    public function getTraitementCours()
    {
        return $this->traitementCours;
    }

    /**
     * Set antecedent
     *
     * @param array $antecedent
     * @return Patient
     */
    public function setAntecedent($antecedent)
    {
        $this->antecedent = $antecedent;

        return $this;
    }

    /**
     * Get antecedent
     *
     * @return array 
     */
    public function getAntecedent()
    {
        return $this->antecedent;
    }
}
