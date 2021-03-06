<?php

namespace App\FormType\Form\Users;

use App\Entity\Base\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Base\SecurityGroup;

class SelfRegisterForm extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("username", TextType::class)
            ->add("fullName", TextType::class)
            ->add("plainPassword", RepeatedType::class, array(
                "type" => PasswordType::class,
                "invalid_message" => "Repeat password did not match.",
                "first_options"  => array("label" => "Password"),
                "second_options" => array("label" => "Repeat Password"),
            ))
            ->add('email', EmailType::class)
            ->add("submit", SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
