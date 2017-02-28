<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 07/02/17
 * Time: 2:09 PM
 */

namespace Viweb\SyliusProductBridgeBundle\Entity;


class ProductTranslation extends \Sylius\Component\Product\Model\ProductTranslation
{
    private $caracteristics;

    private $warranty;

    private $rebate;

    private $financing;

    /**
     * @return mixed
     */
    public function getCaracteristics()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setCaracteristics($caracteristics)
    {
        $this->description = $caracteristics;
    }

    /**
     * @return mixed
     */
    public function getFinancing()
    {
        return $this->financing;
    }

    /**
     * @param mixed $financing
     */
    public function setFinancing($financing)
    {
        $this->financing = $financing;
    }

    /**
     * @return mixed
     */
    public function getWarranty()
    {
        return $this->warranty;
    }

    /**
     * @param mixed $warranty
     */
    public function setWarranty($warranty)
    {
        $this->warranty = $warranty;
    }

    /**
     * @return mixed
     */
    public function getRebate()
    {
        return $this->rebate;
    }

    /**
     * @param mixed $rebate
     */
    public function setRebate($rebate)
    {
        $this->rebate = $rebate;
    }
}