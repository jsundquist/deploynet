<?php
namespace DeployNetBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ManufacturerType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name','text')
            ->add('save', 'submit', ['label' => 'Save']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'DeployNetBundle\Entity\Manufacturer'
        ]);
    }

    public function getName()
    {
        return 'deploy_net_manufacturer';
    }
}