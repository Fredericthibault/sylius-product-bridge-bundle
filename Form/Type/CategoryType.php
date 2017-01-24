<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 23/01/17
 * Time: 4:22 PM
 */

namespace Viweb\SyliusProductBridgeBundle\Form\Type;


use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\FormBuilderInterface;
use Viweb\MediaBundle\Form\Type\MediaType;
use Viweb\SyliusProductBridgeBundle\Entity\Category;

class CategoryType extends AbstractResourceType
{
    public function __construct($dataClass = null, $validationGroups = [])
    {
        if(!$dataClass){
            $dataClass = Category::class;
        }
        parent::__construct($dataClass, $validationGroups);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('translations', ResourceTranslationsType::class, [
            'entry_type' => CategoryTranslationType::class
        ])
            ->add('image', MediaType::class)
        ;
    }
}