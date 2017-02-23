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
                    "Lennox" => "lennox",
                    "Goodman" => "loodman",
                    "Mitsubichi" => "mitsubichi",
                    "Panasonic" => "panasonic",
                    "Aire Flo" => "aire flo",
                    "Honeywell" => "honeywell",
                    "Wr Emerson" => "wr emerson",
                    "Lifebreath" => "lifebreath",
                    "Van-ee" => "van-ee",
                    "Fantech" => "fantech",
                    "Aprilaire" => "aprilaire"
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