<?php

namespace Viweb\SyliusProductBridgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $prd = $this->get('sylius.repository.product')->findAll();
        return $this->render('ViwebSyliusProductBridgeBundle:Default:index.html.twig', ['prd'=> $prd]);
    }
}
