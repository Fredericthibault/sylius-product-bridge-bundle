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
        $maker = $request->get('maker')?? null;

        try {
            $cat = $this->get('viweb.repository.product_category')->findBySlug($slug, $locale, $maker);

        } catch (\Exception $e){
            $cat = [];
        }

        return $this->render('@ViwebSyliusProductBridge/frontend/single.html.twig', [
            'category' => $cat,
            'maker' => $maker
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
    {   $args = explode('/', $id);
        $end = array_pop($args);
        $start = implode('/', $args);
        $cat = $this->get('sylius.repository.product')->createQueryBuilder('p')
            ->select('p', 'pt')
            ->innerJoin('p.translations', 'pt')
            ->innerJoin('p.category', 'pc')
            ->innerJoin('pc.translations', 'pct')
            ->andWhere("pt.slug = :slug")
            ->andWhere("pct.slug = :cslug")
            ->andWhere("pct.locale = :local")
            ->andWhere("pt.locale = :local")
            ->setParameters(['slug'=> $end, 'cslug' => $start, 'local'=> $request->getLocale()])
            ->getQuery()->getSingleResult();
        $cat->setCurrentLocale($request->getLocale());
        return $this->render('@ViwebSyliusProductBridge/frontend/single_product.html.twig', [
            'product' => $cat
        ]);
    }


    }