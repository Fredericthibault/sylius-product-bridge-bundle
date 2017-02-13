<?php
namespace Viweb\SyliusProductBridgeBundle\Form\Extension;


use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Viweb\MediaBundle\Form\Type\MediaType;

class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maker', ChoiceType::class, [
                'choices' => [
                    "lennox" => "Lennox",
                    "goodman" => "Goodman",
                    "mitsubichi" => "Mitsubichi",
                    "panasonic" => "Panasonic",
                    "aire flo" => "Aire Flo",
                    "honeywell" => "Honeywell",
                    "wr emerson" => "Wr Emerson",
                    "lifebreath" => "Lifebreath",
                    "van-ee" => "Van-ee",
                    "fantech" => "Fantech",
                    "aprilaire" => "Aprilaire"
                ]
            ])
            ->add('category', EntityType::class, [
            "label" => "Categorie",
            "class" => 'Viweb\SyliusProductBridgeBundle\Entity\Category',
            "expanded" => false,
            "multiple" => false,
            'required' => false
        ])
            ->add('main_image', MediaType::class, [
                'required' =>false
            ])
            ->add('secondary_image', MediaType::class, ['required' => false ])
        ;
    }

    public function getExtendedType()
    {
        return ProductType::class;
    }
}