<?php

namespace Mrmcburger\GetajobBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Mrmcburger\GetajobBundle\Entity\Address;

/**
 * Class AddressType
 */
class AddressType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', 'text', array('label' => 'Numéro'))
            ->add('type', 'choice', array('label' => 'Type de voie', 'choices' => Address::$typeAddresses, 'required' => false))
            ->add('name', 'text', array('label' => 'Nom de voie'))
            ->add('additional', 'text', array('label' => 'Additionnel', 'required' => false))
            ->add('zip', 'text', array('label' => 'Code Postal'))
            ->add('city', 'text', array('label' => 'Ville'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Mrmcburger\GetajobBundle\Entity\Address',
            )
        );
    }

    public function getName()
    {
        return 'address';
    }
}
