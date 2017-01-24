<?php

namespace Viweb\SyliusProductBridgeBundle\Entity;

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

    public function __construct()
    {
        $this->currentLocale = $this->fallbackLocale = 'en';
        $this->intializeTranslationCollection();
    }

    public function __toString()
    {
        return $this->getTranslation()->getTitle();
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
}
