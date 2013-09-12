<?php
namespace Mrmcburger\GetajobBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Mrmcburger\GetajobBundle\Entity\Interview;

class InterviewType extends AbstractType
{
/**
     * Register mode
     */
    const REGISTER_MODE = 'Registration';

    /**
     * Edit mode
     */
    const EDIT_MODE = 'Edition';

    public function __construct($mode = self::REGISTER_MODE)
    {
        $this->mode = $mode;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if($this->mode == self::REGISTER_MODE)
        {
            $builder
                ->add('application', 'entity', array(
                          'class' => 'MrmcburgerGetajobBundle:Application',
                          'empty_value' => 'Choisissez une candidature',
                          'query_builder' => function(EntityRepository $er) {
                                return $er->createQueryBuilder('a')
                                               ->orderBy('a.date', 'ASC');
                                }))
                ->add('date',                   'date', array('required' => true, 'label' => 'Date d\'entretien', 'widget' => 'single_text'));
        }

        $builder
            ->add('address',       new AddressType())
            ->add('contactName',      'text', array('required' => true, 'label' => 'Nom du contact'))
            ->add(
                'comments',
                 'textarea',
                 array(
                    'required' => false,
                    'label'       => 'Commentaires',

                    'attr'         => array(
                        'rows' => '5',
                        'cols'  => '35'
                    )
                )
            );

            if($this->mode == self::REGISTER_MODE)
            {
                 $builder->add('add_interview', 'submit', array('label' => 'Ajouter'));
            }
            else
            {
                $builder->add('add_interview', 'submit', array('label' => 'Modifier'));
            }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mrmcburger\GetajobBundle\Entity\Interview',
             'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'mrmcburger_getajobbundle_interviewtype';
    }
}
