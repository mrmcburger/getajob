<?php
namespace Mrmcburger\GetajobBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ApplicationDeleteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id',          'text',
                array('required' => true,
                        'attr'          => array(
                            'style' => 'display:none'
                        )
                    )
                )
            ->add('delete_application', 'submit',
                array('label' => 'Supprimer',
                         'attr'   => array(
                            'class' => 'btn btn-danger'
                        )
                    )
                );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    }

    public function getName()
    {
        return 'mrmcburger_getajobbundle_applicationdeletetype';
    }
}
