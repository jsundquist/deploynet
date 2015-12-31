<?php
namespace DeployNetBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class WorkOrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
                "Location",
                'entity',
                [
                    'class' => 'DeployNetBundle:Location',
                    'property' => 'name'
                ]
            )
            ->add(
                "scheduleDate",
                "date",
                [
                    'input'  => 'datetime',
                    'widget' => 'choice',
                ]
            )
            ->add('type', 'text')
            ->add('shortDescription','text')
            ->add('longDescription', 'text')
            ->add('poNumber', 'text')
            ->add('save', 'submit', ['label' => 'Save']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'DeployNetBundle\Entity\Workorder'
        ]);
    }

    public function getName()
    {
        return 'deploy_net_order';
    }
}