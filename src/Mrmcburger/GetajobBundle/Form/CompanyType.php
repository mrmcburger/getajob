<?php
namespace Mrmcburger\GetajobBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Mrmcburger\GetajobBundle\Form\CompanyCriteriaType;


class CompanyType extends AbstractType
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
            $builder->add('name',           'text', array('required' => true, 'label' => 'Nom'));
        }

        $builder
            ->add('sector',          'text', array('required' => true, 'label' => 'Secteur'))
            ->add('address',       new AddressType())
            ->add(
                'presentation',
                 'textarea',
                 array(
                    'required' => false,
                    'label'       => 'Présentation',
                    'attr'         => array(
                        'rows' => '5',
                        'cols'  => '35'
                    )
                )
            )
            ->add('numbers',      'text', array('required' => false, 'label' => 'Effectif'))
            ->add('phone',          'text', array('required' => false, 'label' => 'Téléphone'))
            ->add('mail',             'email', array('required' => false, 'label' => 'Email'))
            ->add('companycriteria', new CompanyCriteriaType())
            ->add('add_company', 'submit', array('label' => 'Ajouter'))
    ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mrmcburger\GetajobBundle\Entity\Company',
            'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'mrmcburger_getajobbundle_companytype';
    }
}
