<?php
namespace Mrmcburger\GetajobBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GlobalCriteriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = array(  '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                    '7' => '7',
                                    '8' => '8',
                                    '9' => '9',
                                    '10' => '10',
                    );

        $builder
            ->add('displacement', 'choice', array('choices'  => $choices,
                                                                  'label' => 'Déplacement',
                                                                  'required' => true ,
                                                                  'preferred_choices' => array('5')))
            ->add('celebrity', 'choice',        array('choices'  => $choices,
                                                                  'label' => 'Renom',
                                                                  'required' => true ,
                                                                  'preferred_choices' => array('5')))
            ->add('missionInterest', 'choice', array('choices'  => $choices,
                                                                     'label' => 'Interêt de la mission',
                                                                     'required' => true ,
                                                                      'preferred_choices' => array('5')))
            ->add('salaryExpectation',  'choice', array('choices'  => $choices,
                                                                  'label' => 'Attente salariale',
                                                                  'required' => true ,
                                                                  'preferred_choices' => array('5')))
            ->add('workConditions', 'choice', array('choices'  => $choices,
                                                                  'label' => 'Conditions de travail',
                                                                  'required' => true ,
                                                                  'preferred_choices' => array('5')))
            ->add('evolutionPossibilities', 'choice', array('choices'  => $choices,
                                                                  'label' => 'Possibilités d\'évolution',
                                                                  'required' => true ,
                                                                  'preferred_choices' => array('5')))
            ->add('modify_globalcriteria', 'submit', array('label' => 'Modifier'));
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mrmcburger\GetajobBundle\Entity\GlobalCriteria'
        ));
    }

    public function getName()
    {
        return 'mrmcburger_getajobbundle_globalcriteriatype';
    }
}
