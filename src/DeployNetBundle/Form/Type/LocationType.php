<?php
namespace DeployNetBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
            ->add('siteId', 'text')
            ->add('address1', 'text')
            ->add('address2', 'text', ['required' => false])
            ->add('address3', 'text', ['required' => false])
            ->add('city', 'text')
            ->add('state', 'entity',
                [
                    'class' => 'DeployNetBundle:State',
                    'property' => 'name'
                ]
            )
            ->add('postalCode', 'text')
            ->add('phoneNumber', 'text', ['required' => false])
            ->add('faxNumber', 'text', ['required' => false])
            ->add('save', 'submit', array('label' => 'Save'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DeployNetBundle\Entity\Location',
        ));
    }

    public function getName()
    {
        return 'deploy_net_location';
    }
}