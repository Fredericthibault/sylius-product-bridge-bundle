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
                    '5 ans' => 'GARANTIE Tous les composantes couvertes – Garantie limitée de cinq ans sur une installation résidentielle et un an sur une installation non résidentielle. Se référer au certificat de garantie limitée d’équipement Lennox inclus avec votre unité pour les détails spécifiques.',
                    '10 ans' => 'GARANTIE Compresseur – Garantie limitée de dix ans sur une installation résidentielle. Tous les autres composantes – Garantie limitée de dix ans sur une installation résidentielle. Main d’oeuvre – Garantie limitée de dix ans sur une installation résidentielle. Se référer au certificat de garantie limitée d’équipement Panasonic inclus avec votre unité pour les détails spécifiques.',
                    '5 ans Goodmans' => 'GARANTIE Compresseur – Garantie limitée de cinq ans sur une installation résidentielle. Tous les autres composantes – Garantie limitée de un an sur une installation résidentielle. Main d’oeuvre – Garantie limitée de un an sur une installation résidentielle. Se référer au certificat de garantie limitée d’équipement Goodman inclus avec votre unité pour les détails spécifiques.'
                ],
                'expanded' => false,
                'multiple' => false,
                'required' => false
            ])
            ->add('rebate', ChoiceType::class, [
                'choices' => [
                    'None' => null,
                    'Default Text' => "Rabais &amp; Subventions <br>Demandez à votre représentant pour les Rabais &amp; Subventions en vigueuer au moment de votre achat ou envoyez nous un courriel à l’adresse suivante: <a href=\"mailto:info@climatisationbs.com\"><strong><span style=\"color: #0404B4; text-decoration: underline;\"> info@climatisationbs.com</span></strong></a><br><strong><u>For Réno Climat you can visit the following website:</u></strong><br>Before undertaking any work, call us at 1-866-266-0008. A Rénoclimat energy advisor will contact you to schedule an appointment.<br><a href=\"http://www.efficaciteenergetique.gouv.qc.ca/en/my-home/renoclimat/energy-evaluation/pre-work-energy-evaluation/#c4209\">Be sure to check the costs related to this pre-work evaluation.</a><br><strong><u>Green Heating</u></strong><br>Your participation to Rénoclimat entitles you to benefit from <a href=\"http://www.efficaciteenergetique.gouv.qc.ca/en/my-home/chauffez-vert/#.VQM2EFRVhBd\">Heating with Green Power</a> without any other extra steps. <br>For more information, please visit the website : <a href=\"http://www.efficaciteenergetique.gouv.qc.ca/en/my-home/renoclimat/steps-to-follow/#.VQM2tlRVhBe\">Énergie &amp; Ressources Naturelles Québec</a><br>"
                ],
                'expanded' => false,
                'multiple' => false,
                'required' => false
            ])
            ->add('financing', ChoiceType::class, [
                'choices' => [
                    'None' => null,
                    'Default Text' => "Financement disponible avec la Snap Financière. Selon approbation du crédit, vous pouvez bénéficiez de 3 mois sans paiements ni intérêt si la totalité de la facture est acquittée à l’échéance du 3 mois. Sinon vous bénéficierez d’un contrat ouvert sur une période de cinq ans au taux de +/- 8.75% selon le montant financé, rétroactif à la date d’installation. Selon la période de l’année et toujours selon l’approbation du crédit, certaines possibilités de 6 mois sans paiements ni intérêt peuvent être disponibles si acquittée à l’échéance du 6 mois. Sinon vous bénéficierez d’un contrat ouvert sur une période de cinq ans au taux de +/- 8.75% selon le montant financé, rétroactif à la date d’installation. Vérifiez avec votre représentant pour les promotions en vigueur à cet effet. Pour de plus amples informations veuillez demandez à votre représentant ou par courriel à l’adresse suivante: info@climatisationbs.com"
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