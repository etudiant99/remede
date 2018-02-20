<?php

namespace medic\MedicamentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MedicamentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text')
            /*
             * Rappel :
             ** - 1er argument : nom du champ, ici « categories », car c'est le nom de l'attribut
             ** - 2e argument : type du champ, ici « collection » qui est une liste de quelque chose
             ** - 3e argument : tableau d'options du champ
             */
            ->add('substances', 'entity', array(
                    'class'    => 'medicSubstanceBundle:Substance',
                    'property' => 'nom',
                    'multiple' => true
                ))
            ->add('Valider', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medic\MedicamentBundle\Entity\Medicament'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'med_consultationbundle_medicament';
    }
}
