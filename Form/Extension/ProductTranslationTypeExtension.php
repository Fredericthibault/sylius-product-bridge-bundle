<?php
namespace Viweb\SyliusProductBridgeBundle\Form\Extension;

use Sylius\Bundle\ProductBundle\Form\Type\ProductTranslationType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Viweb\MediaBundle\Form\Type\MediaType;

class ProductTranslationTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('caracteristics', TextareaType::class)
            ->add('warranty', ChoiceType::class, [
                'choices' => [
                    'None' => null,
                    'Lennox 5 ans' => 'product.warranty.lennox5',
                    'Lennox 10 ans' => 'product.warranty.lennox10',
                    'Goodmans 5 ans' => 'product.warranty.goodmans5',
                    'Lennox Signature' => 'product.warranty.lennox.signature',
                    'Lennox Elite' => 'product.warranty.lennox.elite',
                    'Lennox Merit' => 'product.warranty.lennox.merit',
                    'Duralok Plus' => 'product.warranty.duralokplus',
                    'Duralok Plus Merit' => 'product.warranty.duralokplus.merit',
                    'Lennox Signature complet' => 'product.warranty.lennox.signature.all',
                    'Lennox Elite complet' => 'product.warranty.lennox.elite.all',
                    '10ans Panasonic' => 'product.warranty.panasonic10',
                    '10ans Mitsubishi' => 'product.warranty.mitshubishi10',
                    'Zuba' => 'product.warranty.zuba',
                    'Sl18xc1' => 'product.warranty.sl18xc1',
                    'Aire Flo' => 'product.warranty.aireflo',
                    'i Harmony' => 'product.warranty.iHarmony',
                    'Lennox 5ans Limited' => 'product.warranty.limited.lennox5',
                    'Lennox 2ans Limited' => 'product.warranty.limited.lennox2',
                    'Honeywell 5ans' => 'product.warranty.limited.honeywell5',
                    'WR Emerson 5ans' => 'product.warranty.limited.wr5',
                    'Lennox 5ans Residentielle' => 'product.warranty.limited.residential.lennox5',
                    'HRV' => 'product.warranty.hrv',
                    'Lifebreath' => 'product.warranty.lifebreath',
                    'Fantech' => 'product.warranty.fantech',
                    'Van ee 2ans' => 'product.warranty.vanee2',
                    'Van ee 5ans' => 'product.warranty.vanee5',
                    'Pureair' => 'product.warranty.pureair',
                    'HC' => 'product.warranty.hc',
                    'Filtres Goodman' => 'product.warranty.goodmans.filter',
                    'Aprilaire' => 'product.warranty.aprilaire',
                    'Hepa' => 'product.warranty.hepa'
                ],
                'expanded' => false,
                'multiple' => false,
                'required' => false
            ])
            ->add('rebate', ChoiceType::class, [
                'choices' => [
                    'None' => null,
                    'Default Text' => "product.rebate.default"
                ],
                'expanded' => false,
                'multiple' => false,
                'required' => false
            ])
            ->add('financing', ChoiceType::class, [
                'choices' => [
                    'None' => null,
                    'Default Text' => "product.financing.default"
                ],
                'expanded' => false,
                'multiple' => false,
                'required' => false
            ])
        ;
    }

    public function getExtendedType()
    {
        return ProductTranslationType::class;
    }
}