<?php
/**
 * Copyright © Copyright (c) 2024 Osio All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Osio\ProductClassToPostcode\Model\Product\Attribute\Source;

use Osio\ProductClassToPostcode\Model\ResourceModel\ProductClass\CollectionFactory as OptionCollectionFactory;
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class ProductClass extends AbstractSource
{

    public function __construct(
        readonly private OptionCollectionFactory $optionCollectionFactory
    ) {}

    public function getAllOptions(): array
    {
        $options = [];
        $collection = $this->optionCollectionFactory->create();
        $collection->getSelect()->group('main_table.class_id');
        $options[] = ['label' => 'No extra costs', 'value' => 0];

        foreach ($collection as $item) {
            $options[] = ['label' => $item->getClassId(), 'value' => $item->getClassId()];
        }

        return $options;
    }
}

