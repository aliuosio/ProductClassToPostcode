<?php
/**
 * Copyright © Copyright (c) 2024 BIWAC All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BIWAC\ProductClassToPostcode\Model;

use BIWAC\ProductClassToPostcode\Api\Data\ProductClassInterface;
use BIWAC\ProductClassToPostcode\Api\Data\ProductClassInterfaceFactory;
use BIWAC\ProductClassToPostcode\Api\Data\ProductClassSearchResultsInterfaceFactory;
use BIWAC\ProductClassToPostcode\Api\ProductClassRepositoryInterface;
use BIWAC\ProductClassToPostcode\Model\ResourceModel\ProductClass as ResourceProductClass;
use BIWAC\ProductClassToPostcode\Model\ResourceModel\ProductClass\CollectionFactory as ProductClassCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductClassRepository implements ProductClassRepositoryInterface
{

    /**
     * @var ProductClass
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ProductClassInterfaceFactory
     */
    protected $productClassFactory;

    /**
     * @var ResourceProductClass
     */
    protected $resource;

    /**
     * @var ProductClassCollectionFactory
     */
    protected $productClassCollectionFactory;


    /**
     * @param ResourceProductClass $resource
     * @param ProductClassInterfaceFactory $productClassFactory
     * @param ProductClassCollectionFactory $productClassCollectionFactory
     * @param ProductClassSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceProductClass $resource,
        ProductClassInterfaceFactory $productClassFactory,
        ProductClassCollectionFactory $productClassCollectionFactory,
        ProductClassSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->productClassFactory = $productClassFactory;
        $this->productClassCollectionFactory = $productClassCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(ProductClassInterface $productClass)
    {
        try {
            $this->resource->save($productClass);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the productClass: %1',
                $exception->getMessage()
            ));
        }
        return $productClass;
    }

    /**
     * @inheritDoc
     */
    public function get($productClassId)
    {
        $productClass = $this->productClassFactory->create();
        $this->resource->load($productClass, $productClassId);
        if (!$productClass->getId()) {
            throw new NoSuchEntityException(__('ProductClass with id "%1" does not exist.', $productClassId));
        }
        return $productClass;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->productClassCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(ProductClassInterface $productClass)
    {
        try {
            $productClassModel = $this->productClassFactory->create();
            $this->resource->load($productClassModel, $productClass->getProductclassId());
            $this->resource->delete($productClassModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the ProductClass: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($productClassId)
    {
        return $this->delete($this->get($productClassId));
    }
}

