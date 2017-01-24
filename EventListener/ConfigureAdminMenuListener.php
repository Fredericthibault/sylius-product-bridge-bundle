<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 18/01/17
 * Time: 1:34 PM
 */

namespace Viweb\SyliusProductBridgeBundle\EventListener;

use Viweb\SystemBundle\Event\ConfigureAdminMenuEvent;
use Viweb\SystemBundle\EventListener\ConfigureAdminMenuListener as BaseListener;

final class ConfigureAdminMenuListener extends BaseListener
{
    public function onMenuConfigure(ConfigureAdminMenuEvent $event)
    {
        $menu = $event->getMenu();
        $menu->addChild('Products', ['route' => 'sylius_admin_product_index']);
        $menu->getChild('Products')->addChild('Categories', ['route' => 'viweb_admin_product_category_index']);
    }

}