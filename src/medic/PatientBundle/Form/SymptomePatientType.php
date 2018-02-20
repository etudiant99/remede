<?php

namespace medic\PatientBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class SymptomePatientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('date')
            
            ->add('patient', 'entity', array(
                    'class'    => 'medicPatientBundle:Patient',
                    'property' => 'PrenomNom',
                    'label'    => 'Nom du patient '
            ))
            
            ->add('symptome', 'entity', array(
                    'class'    => 'medicSymptomeBundle:Symptome',
                    'property' => 'nom',
                    'multiple' => false
            ))

            ->add('Valider',  'submit');

    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medic\PatientBundle\Entity\SymptomePatient'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'medic_patientbundle_symptomepatient';
    }
}
