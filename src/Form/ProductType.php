<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Supplier;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class  ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name')
        ->add('price')
        ->add('created',DateType::class,[
            'widget' =>'single_text','required'=> false
        ])
        ->add('quantity')
        // ->add('catepro')
        ->add('supppro', EntityType::class,['class'=>Supplier::class,'choice_label'=>'suppliername'])

        ->add('file', FileType::class, [
            'label' => 'Product Image', 'required' => false, 'mapped'=>false]
        )
        ->add('image',HiddenType::class,[
            'required'=> false
        ])
        ->add('save',SubmitType::class,[
            'label' => "Cofirm"
        ])
        ->add('productinformation');
    }
}
?>