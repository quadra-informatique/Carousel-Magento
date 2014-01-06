<?php

/*
 * 1997-2012 Quadra Informatique
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0) that is available
 * through the world-wide-web at this URL: http://www.opensource.org/licenses/OSL-3.0
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to ecommerce@quadra-informatique.fr so we can send you a copy immediately.
 *
 *  @author Quadra Informatique <ecommerce@quadra-informatique.fr>
 *  @copyright 1997-2013 Quadra Informatique
 *  @version Release: $Revision: 1.0.0 $
 *  @license http://www.opensource.org/licenses/OSL-3.0  Open Software License (OSL 3.0)
 */

class Quadra_Carousel_Block_Slider extends Mage_Catalog_Block_Product_Abstract {

    protected $_productCollection = array();

    /**
     * Retrieve category collection
     *
     * @return Mage_Eav_Model_Entity_Collection_Abstract
     */
    public function getProductCollection() {
        if (!count($this->_productCollection)) {
            if ($this->getCategoryId()) {
                $category = Mage::getModel('catalog/category')->load($this->getCategoryId());
                if ($category->getId()) {
                    $this->_productCollection = $category->getProductCollection();
                }
            }
        }

        return $this->_productCollection;
    }

    public function getConfigData($attribute) {
        return Mage::getStoreConfig('carousel/slide/'.$attribute);
    }

}