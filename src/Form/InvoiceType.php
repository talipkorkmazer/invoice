<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Invoice;
use App\Entity\User;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('invoice_no', TextType::class)
            ->add('ettn', TextType::class)
            ->add(
                'invoice_date',
                DateType::class,
                [
                    'widget' => 'single_text',
                ]
            )
            ->add('service', TextType::class)
            ->add('quantity', TextType::class)
            ->add('unit_price', MoneyType::class)
            ->add('currency', TextType::class)
            ->add(
                'user',
                EntityType::class,
                [
                    'class' => User::class,
                    'choice_label' => 'name',
                ]
            )
            ->add(
                'company',
                EntityType::class,
                [
                    'class' => Company::class,
                    'choice_label' => 'name',
                ]
            )
            ->add('total', MoneyType::class)
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Invoice::class,
            ]
        );
    }
}
