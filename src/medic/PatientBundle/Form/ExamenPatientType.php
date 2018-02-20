<?php

namespace medic\PatientBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExamenPatientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', 'date', array('pattern'=>'d-M-Y'))
            ->add('valeur')
            ->add('patient', 'entity', array(
                    'class'    => 'medicPatientBundle:Patient',
                    'property' => 'nom',
                    'multiple' => false
            ))
            ->add('examen', 'entity', array(
                    'class'    => 'medicExamenBundle:Examen',
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
            'data_class' => 'medic\PatientBundle\Entity\ExamenPatient'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'medic_patientbundle_examenpatient';
    }
}
