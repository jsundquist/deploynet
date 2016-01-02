<?php
namespace DeployNetBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkOrderCommentType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('comment', 'textarea');
        $builder->add('important', 'checkbox', ['required'  => false]);
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

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'DeployNetBundle\Entity\WorkOrderComment'
        ]);
    }

    /**
     *
     */
    public function getName()
    {
        return 'deploy_net_work_order_comment';
    }
}