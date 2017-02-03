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
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Viweb\SyliusProductBridgeBundle\Entity\Category;
use Viweb\SystemBundle\Event\ConfigureFrontendMenuEvent;

//use Doctrine\Common\Persistence\Mapping\ClassMetadata;

class ProductMenuListener implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return array(
            ConfigureFrontendMenuEvent::CONFIGURE =>
                [
                    ['processMenu', 0]
                ]
        );
    }

    public function processMenu(ConfigureFrontendMenuEvent $event)
    {
        $repo = $event->getEm()->getRepository('viweb.repository.product_category');
        $cats = $repo->findAll();
    }


}