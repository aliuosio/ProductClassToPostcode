<?php
/**
 * Copyright © Copyright (c) 2024 BIWAC All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BIWAC\ProductClassToPostcode\Api\Data;

interface ProductClassSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get ProductClass list.
     * @return \BIWAC\ProductClassToPostcode\Api\Data\ProductClassInterface[]
     */
    public function getItems();

    /**
     * Set entity_id list.
     * @param \BIWAC\ProductClassToPostcode\Api\Data\ProductClassInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

