<?php
namespace DeployNetBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("name", "text")
            ->add("description", "text")
            ->add("type", "text")
            ->add(
                "customer",
                'entity',
                [
                    'class' => 'DeployNetBundle:Customer',
                    'property' => 'name'
                ]
            )
            ->add('save', 'submit', ['label' => 'Save']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'DeployNetBundle\Entity\Project'
        ]);
    }

    public function getName()
    {
        return 'deploy_net_project';
    }
}
