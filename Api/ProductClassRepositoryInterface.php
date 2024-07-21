<?php
/**
 * Copyright © Copyright (c) 2024 Osio All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Osio\ProductClassToPostcode\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ProductClassRepositoryInterface
{

    /**
     * Save ProductClass
     * @param \Osio\ProductClassToPostcode\Api\Data\ProductClassInterface $productClass
     * @return \Osio\ProductClassToPostcode\Api\Data\ProductClassInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Osio\ProductClassToPostcode\Api\Data\ProductClassInterface $productClass
    );

    /**
     * Retrieve ProductClass
     * @param string $productclassId
     * @return \Osio\ProductClassToPostcode\Api\Data\ProductClassInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($productclassId);

    /**
     * Retrieve ProductClass matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Osio\ProductClassToPostcode\Api\Data\ProductClassSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete ProductClass
     * @param \Osio\ProductClassToPostcode\Api\Data\ProductClassInterface $productClass
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Osio\ProductClassToPostcode\Api\Data\ProductClassInterface $productClass
    );

    /**
     * Delete ProductClass by ID
     * @param string $productclassId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($productclassId);
}

