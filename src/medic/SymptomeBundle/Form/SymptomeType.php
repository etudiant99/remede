<?php

namespace medic\SymptomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SymptomeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('questionnaire', 'entity', array(
                    'class'    => 'medicSymptomeBundle:Questionnaire',
                    'property' => 'question',
                    'multiple' => true
                ))
            ->add('Valider', 'submit');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medic\SymptomeBundle\Entity\Symptome'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'medic_symptomebundle_symptome';
    }
}
