<?php
namespace DeployNetBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkOrderDocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description', 'text');
        $builder->add('file', 'file');
        $builder->add(
            "Visibility",
            'entity',
            [
                'class' => 'DeployNetBundle:Visibility',
                'property' => 'name',
                'multiple' => true,
                'expanded' => true
            ]
        );
        $builder->add('save', 'submit', ['label' => 'Save']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'DeployNetBundle\Entity\WorkOrderDocument'
        ]);
    }

    public function getName()
    {
        return 'deploy_net_work_order_document';
    }
}