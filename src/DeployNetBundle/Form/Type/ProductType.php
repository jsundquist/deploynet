<?php
namespace DeployNetBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("partNumber", "text")
            ->add("altPartNumber", "text")
            ->add("description", "text")
            ->add('serialized', 'checkbox')
            ->add(
                "manufacturer",
                'entity',
                [
                    'class' => 'DeployNetBundle:Manufacturer',
                    'property' => 'name'
                ]
            )
            ->add('save', 'submit', ['label' => 'Save']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'DeployNetBundle\Entity\Product'
        ]);
    }

    public function getName()
    {
        return 'deploy_net_product';
    }
}