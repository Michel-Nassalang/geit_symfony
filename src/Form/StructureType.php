<?php

namespace App\Form;

use App\Entity\Structure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class StructureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('adresse')
            ->add('telephone',TextType::class,array('attr'=>array('maxlength'=>9)))
            ->add('type',ChoiceType::class,array('label'=>'Type Structure','choices'=>array('SA'=>'Societe Anonyme','SARL'=>'SAR limite'),'multiple'=>false))
            ->add('dateupdate',DateTimeType::class,array(
                "widget" => 'single_text',
                "data"=> new \Datetime()))
            ->add('datedelete',DateTimeType::class,array(
                "widget" => 'single_text',
                "data"=> new \Datetime()))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Structure::class,
        ]);
    }
}
