<?php

namespace medic\PatientBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PatientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nam', 'text', array('label' => "Assurance maladie"))
            ->add('prenom', 'text', array('label' => "Prénom"))
            ->add('nom')
            ->add('poids')
            ->add('taille')
            ->add('dateNaissance', 'birthday', array('label' => 'Date de naissance'))  
            ->add('medecinTraitant', 'text', array('label' => "Médecin traitant", 'required' => false))
            ->add('medecinFamille', 'text', array('label' => "Médecin de famille", 'required' => false))
            ->add('adresse')
            ->add('telephone', 'text', array('label' => "Téléphone"))
            ->add('antecedent', 'collection', array('type'   => 'text', 'allow_add'    => true, 'allow_delete' => true, 'label' => "Antécédents", 'required' => false))
            ->add('allergie', 'collection', array('type'   => 'text', 'allow_add'    => true, 'allow_delete' => true, 'label' => "Allergies", 'required' => false))
            ->add('traitementCours', 'collection', array('type'   => 'text', 'allow_add'    => true, 'allow_delete' => true, 'label' => "Traitements en cours", 'required' => false))
            ->add('Valider',  'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medic\PatientBundle\Entity\Patient'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'medic_patientbundle_patient';
    }
}
