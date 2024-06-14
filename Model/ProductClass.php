<?php
/**
 * Copyright © Copyright (c) 2024 BIWAC All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BIWAC\ProductClassToPostcode\Model;

use BIWAC\ProductClassToPostcode\Api\Data\ProductClassInterface;
use BIWAC\ProductClassToPostcode\Model\ResourceModel\ProductClass as ResourceProductClass;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;

class ProductClass extends AbstractModel implements ProductClassInterface
{

    public function __construct(
        readonly private ResourceProductClass $resourceProductClass,
        Context                               $context, Registry $registry,
        AbstractResource                      $resource = null,
        AbstractDb                            $resourceCollection = null,
        array                                 $data = []
    )
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\BIWAC\ProductClassToPostcode\Model\ResourceModel\ProductClass::class);
    }

    /**
     * @inheritDoc
     */
    public function getProductclassId()
    {
        return $this->getData(self::entity_id);
    }

    /**
     * @inheritDoc
     */
    public function setProductclassId($productclassId)
    {
        return $this->setData(self::entity_id, $productclassId);
    }

    /**
     * @inheritDoc
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * @inheritDoc
     */
    public function getClassId()
    {
        return $this->getData(self::CLASS_ID);
    }

    /**
     * @inheritDoc
     */
    public function setClassId($classId)
    {
        return $this->setData(self::CLASS_ID, $classId);
    }

    /**
     * @inheritDoc
     */
    public function getPostcode()
    {
        return $this->getData(self::POSTCODE);
    }

    /**
     * @inheritDoc
     */
    public function setPostcode($postcode)
    {
        return $this->setData(self::POSTCODE, $postcode);
    }

    /**
     * @inheritDoc
     */
    public function getPrice()
    {
        return $this->getData(self::PRICE);
    }

    /**
     * @inheritDoc
     */
    public function setPrice($price)
    {
        return $this->setData(self::PRICE, $price);
    }

    /**
     * @throws LocalizedException
     */
    public function getPostcodePrice(?string $postcode, ?string $classId): string|bool
    {
        return $this->resourceProductClass->fetchPostcodePrice($postcode, $classId);
    }
}

