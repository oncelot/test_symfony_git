<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class TaskType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      //  parent::buildForm($builder, $options); // TODO: Change the autogenerated stub
        $builder
            ->add('cognome',TextType::class)
            ->add('nome',TextType::class)

            ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Task',
        ));
    }




}


?>