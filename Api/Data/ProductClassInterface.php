<?php
/**
 * Copyright © Copyright (c) 2024 Osio All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Osio\ProductClassToPostcode\Api\Data;

interface ProductClassInterface
{

    const ENTITY_ID = 'entity_id';
    const PRICE = 'price';
    const entity_id = 'entity_id';
    const CLASS_ID = 'class_id';
    const POSTCODE = 'postcode';

    /**
     * Get entity_id
     * @return string|null
     */
    public function getProductclassId();

    /**
     * Set entity_id
     * @param string $productclassId
     * @return \Osio\ProductClassToPostcode\ProductClass\Api\Data\ProductClassInterface
     */
    public function setProductclassId($productclassId);

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId();

    /**
     * Set entity_id
     * @param string $entityId
     * @return \Osio\ProductClassToPostcode\ProductClass\Api\Data\ProductClassInterface
     */
    public function setEntityId($entityId);

    /**
     * Get class_id
     * @return string|null
     */
    public function getClassId();

    /**
     * Set class_id
     * @param string $classId
     * @return \Osio\ProductClassToPostcode\ProductClass\Api\Data\ProductClassInterface
     */
    public function setClassId($classId);

    /**
     * Get postcode
     * @return string|null
     */
    public function getPostcode();

    /**
     * Set postcode
     * @param string $postcode
     * @return \Osio\ProductClassToPostcode\ProductClass\Api\Data\ProductClassInterface
     */
    public function setPostcode($postcode);

    /**
     * Get price
     * @return string|null
     */
    public function getPrice();

    /**
     * Set price
     * @param string $price
     * @return \Osio\ProductClassToPostcode\ProductClass\Api\Data\ProductClassInterface
     */
    public function setPrice($price);
}

