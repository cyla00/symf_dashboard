<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\DateType;


class AddBookFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [ 'label'  => false ])
            ->add('reference', null, [ 'label'  => false ])

            // to erase don't forget to put back the coma. Added DateType::class, replace it with null, if an error occurred. And put the labels back to false. And replace DateType::class by null.

            ->add('writtingDate', DateType::class)
            ->add('editionDAte', DateType::class)
            ->add('title', null, ['label' => false]);

            // ->add('writtingDate', null, ['label' => false])
            // ->add('editionDAte', null, ['label' => false])
            // ->add('title', null, ['label' => false]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
