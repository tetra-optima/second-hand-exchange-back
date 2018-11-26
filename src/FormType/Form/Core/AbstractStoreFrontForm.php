<?php
/**
 * Created by PhpStorm.
 * User: ypoon
 * Date: 26/11/2018
 * Time: 5:51 PM
 */

namespace App\FormType\Form\Core;

use App\Entity\Core\AbstractStoreFront;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbstractStoreFrontForm extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("name", TextType::class)
            ->add("isDisabled", CheckboxType::class)
            ->add("isSticky", CheckboxType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            "data_class" => AbstractStoreFront::class
        ]);
    }

}