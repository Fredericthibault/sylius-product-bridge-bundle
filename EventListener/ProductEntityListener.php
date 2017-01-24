<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 24/01/17
 * Time: 9:10 AM
 */

namespace Viweb\SyliusProductBridgeBundle\EventListener;


use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;
use Viweb\SyliusProductBridgeBundle\Entity\Category;

//use Doctrine\Common\Persistence\Mapping\ClassMetadata;

class ProductEntityListener implements EventSubscriber
{

    public function getSubscribedEvents()
    {
        return array(
            Events::loadClassMetadata,
        );
    }

    /**
     * @param LoadClassMetadataEventArgs $eventArgs
     */
    public function loadClassMetadata(\Doctrine\ORM\Event\LoadClassMetadataEventArgs $eventArgs)
    {
        // the $metadata is the whole mapping info for this class
        /**
         * @var ClassMetadata $metadata
         */
        $metadata = $eventArgs->getClassMetadata();

        $namingStrategy = $eventArgs
            ->getEntityManager()
            ->getConfiguration()
            ->getNamingStrategy()
        ;

        if ($metadata->getName() != 'Sylius\Component\Product\Model\Product') {
            return;
        }

//        $metadata->mapField([
//            'fieldName' => 'category',
//            'type' => 'integer',
//            'nullable' => 'true'
//        ]);
        $metadata->mapManyToOne([
            'targetEntity' => Category::class,
            'fieldName' => 'category',
            'cascade' => ['persist'],
            'joinColumn' => [
                'name' => $namingStrategy->joinKeyColumnName($metadata->getName()),
                'referencedColumnName'  => $namingStrategy->referenceColumnName()
            ]
        ]);
    }

}
{

}