<?php
namespace DeployNetBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkOrderLineType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            "product",
            'entity',
            [
                'class' => 'DeployNetBundle:Product',
                'property' => 'partNumber'
            ]
        )
            ->add('description', 'text')
            ->add('quantity', 'text', [
                "mapped" => false,
            ])
            ->add('save', 'submit', ['label' => 'Save']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'DeployNetBundle\Entity\WorkOrderLine'
        ]);
    }

    public function getName()
    {
        return 'deploy_net_workorderline';
    }
}