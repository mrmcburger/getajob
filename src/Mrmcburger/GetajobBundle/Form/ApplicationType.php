<?php
namespace Mrmcburger\GetajobBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Mrmcburger\GetajobBundle\Entity\Application;

class ApplicationType extends AbstractType
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
        }

        $builder
            ->add('company', 'entity', array(
                      'class' => 'MrmcburgerGetajobBundle:Company',
                      'query_builder' => function(EntityRepository $er) {
                            return $er->createQueryBuilder('c')
                                           ->orderBy('c.name', 'ASC');
                            }))
            ->add('date',                   'date', array('required' => true, 'label' => 'Date de candidature', 'widget' => 'single_text'))
            ->add('cv',                      'file',  array('label' => 'CV', 'required' => false))
            ->add('applicationLetter', 'file',  array('label' => 'Lettre de motivation', 'required' => false))
            ->add('contactName',      'text', array('required' => true, 'label' => 'Nom du contact'))
            ->add('contactWay', 'choice', array('label' => 'Moyen de contact', 'choices' =>  Application::$candidatureType, 'required' => false))
            ->add('replyWay', 'choice', array('label' => 'Moyen de réponse attendu', 'choices' =>  Application::$replyType, 'required' => false))
            ->add('replyDate', 'date', array('required' => true, 'label' => 'Date de réponse attendue', 'widget' => 'single_text'))
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
                 $builder->add('add_application', 'submit', array('label' => 'Ajouter'));
            }
            else
            {
                $builder->add('add_application', 'submit', array('label' => 'Modifier'));
            }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mrmcburger\GetajobBundle\Entity\Application',
        ));
    }

    public function getName()
    {
        return 'mrmcburger_getajobbundle_applicationtype';
    }
}
