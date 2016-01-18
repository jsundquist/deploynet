<?php
namespace DeployNetBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SerialType extends AbstractType
{

    private $fieldName = 'serialNumberIn';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id', 'hidden')
            ->add($this->fieldName, 'text')
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
        return 'deploy_net_serial_type';
    }

    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;
    }
}