<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 24/01/17
 * Time: 10:06 AM
 */

namespace Viweb\SyliusProductBridgeBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class Product extends \Sylius\Component\Product\Model\Product
{
    protected $category;

    protected $mainImage;

    protected $secondaryImage;

    /**
     * @return mixed
     */
    public function getSecondaryImage()
    {
        return $this->secondaryImage;
    }

    /**
     * @param mixed $secondaryImage
     * @return Product
     */
    public function setSecondaryImage($secondaryImage)
    {
        $this->secondaryImage = $secondaryImage;
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param ArrayCollection $category
     * @return Product
     */
    public function setCategory(ArrayCollection $category): Product
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMainImage()
    {
        return $this->mainImage;
    }

    /**
     * @param mixed $image
     * @return Product
     */
    public function setMainImage($image)
    {
        $this->mainImage = $image;
        return $this;
    }


}
