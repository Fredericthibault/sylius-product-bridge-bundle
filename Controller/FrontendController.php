<?php

namespace Viweb\SyliusProductBridgeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FrontendController extends Controller
{
    public function searchAction(Request $request)
    {
        $repo = $this->get("sylius.repository.product");

        $qb = $repo->createQueryBuilder('p');
        $qb->select('p', 'pt', 'c', 'ct', 'a')
            ->leftJoin('p.translations', 'pt')
            ->leftJoin('p.category', 'c')
            ->leftJoin('c.translations', 'ct')
            ->leftJoin('p.attributes', 'a');
        if($request->query->get('term')) {
            $qb->andWhere("pt.name LIKE :term")
                ->setParameter('term', '%' . $request->query->get('term') . '%');
        }
        if($request->query->get('category'))
        {
            $qb->andWhere('ct.title LIKE :cat')
                ->setParameter('cat', '%' . $request->query->get('category') . '%');
        }
        if($request->query->get('maker'))
        {
            $qb->andWhere('a.value LIKE :maker')
                ->setParameter('maker', '%' . $request->query->get('maker') . '%');
        }

        $products = $qb->getQuery()->getResult();

        return $this->render('@ViwebSyliusProductBridge/frontend/search.html.twig', [
            'products' => $products
        ]);




    }

}