<?php

namespace Viweb\SyliusProductBridgeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;

/**
 * Category
 */
class Category implements ResourceInterface, TranslatableInterface
{
    use TranslatableTrait {
        __construct as intializeTranslationCollection;
    }

    private $products;

    private $children;

    private $parent;
    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->children = new ArrayCollection();
        $this->currentLocale = $this->fallbackLocale = 'fr';
        $this->intializeTranslationCollection();
    }

    public function __toString()
    {
        return $this->getTranslation()->getTitle();
    }

    /**
     * @return ArrayCollection
     */
    public function getChildren(): ArrayCollection
    {
        return $this->children;
    }

    public function getChild($id)
    {
        return $this->children->get($id);
    }

    public function addChild($category)
    {
        $this->children->add($category);
        return $this;
    }

    public function removeChildren($category)
    {
        $this->children->removeElement($category);
        return $this;
    }

    /**
     * @param ArrayCollection $children
     * @return Category
     */
    public function setChildren(ArrayCollection $children): Category
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     * @return Category
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }


    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $ordering;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ordering
     *
     * @param integer $ordering
     *
     * @return Category
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;

        return $this;
    }

    /**
     * Get ordering
     *
     * @return int
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    public function createTranslation()
    {
        return new CategoryTranslation();
    }

    public function getTitle()
    {
        return $this->getTranslation()->getTitle();
    }
    /**
     * @var \Viweb\MediaBundle\Entity\Media
     */
    private $image;


    /**
     * Set image
     *
     * @param \Viweb\MediaBundle\Entity\Media $image
     *
     * @return Category
     */
    public function setImage(\Viweb\MediaBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Viweb\MediaBundle\Entity\Media
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    public function addProduct($product)
    {
        $this->products->add($product);
        return $this;
    }

    public function removeProduct($product)
    {
        $this->products->removeElement($product);
        return $this;
    }

    /**
     * @param ArrayCollection $products
     */
    public function setProducts(ArrayCollection $products)
    {
        $this->products = $products;
        return $this;
    }

}
