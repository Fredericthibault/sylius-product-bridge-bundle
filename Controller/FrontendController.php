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
    
    public function singleCategoryAction(Request $request, $slug)
    {
        $locale = $request->getLocale();

        $cat = $this->get('viweb.repository.product_category')->findBySlug($slug, $locale);

        return $this->render('@ViwebSyliusProductBridge/frontend/single.html.twig', [
            'category' => $cat
        ]);
    }
    
    public function categoryListAction()
    {
        $cats = $this->get('viweb.repository.product_category')->findAll();
        return $this->render('@ViwebSyliusProductBridge/frontend/_categories.html.twig', [
            'categories' => $cats
        ]);
    }

    public function singleProductAction(Request $request, $id)
    {
        $cat = $this->get('sylius.repository.product')->find($id);

        return $this->render('@ViwebSyliusProductBridge/frontend/single_product.html.twig', [
            'product' => $cat
        ]);
    }

}