<?php

namespace Viweb\SyliusProductBridgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        //$prd = $this->get('sylius.repository.product')->findAll();
        $cts = $this->get('viweb.repository.product_category')->findAll();
        return $this->render('ViwebSyliusProductBridgeBundle:Default:index.html.twig', ['categories'=> $cts]);
    }
}
