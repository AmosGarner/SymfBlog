<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 3/16/17
 * Time: 4:17 PM
 */

namespace BlogBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;

class BlogEditForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'constraints' => new Length(array('min' => 5))
            ))
            ->add('description', TextareaType::class, array(
                'constraints' => new Length(array('max' => 250)),
                'required' => false,
            ))
            ->add('published', CheckboxType::class)
            ->add('submit', SubmitType::class, array('label' => 'Edit Blog'));
    }
}