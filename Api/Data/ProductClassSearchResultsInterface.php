<?php
/**
 * Copyright © Copyright (c) 2024 Osio All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Osio\ProductClassToPostcode\Api\Data;

interface ProductClassSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get ProductClass list.
     * @return \Osio\ProductClassToPostcode\Api\Data\ProductClassInterface[]
     */
    public function getItems();

    /**
     * Set entity_id list.
     * @param \Osio\ProductClassToPostcode\Api\Data\ProductClassInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

