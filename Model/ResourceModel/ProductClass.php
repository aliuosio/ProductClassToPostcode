<?php
/**
 * Copyright © Copyright (c) 2024 BIWAC All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BIWAC\ProductClassToPostcode\Model\ResourceModel;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ProductClass extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('biwac_productclasstopostcode_productclass', 'entity_id');
    }

    /**
     * @throws LocalizedException
     */
    public function fetchPostcodePrice(?string $postcode, ?string $classId): string|bool
    {
        $connection = $this->getConnection();
        $select = $connection->select()
            ->from($this->getMainTable(), ['price'])
            ->where('class_id = :class_id')
            ->where('postcode = :postcode')
            ->limit(1);

        $bind = [
            ':class_id' => $classId,
            ':postcode' => $postcode,
        ];

        return $connection->fetchOne($select, $bind);
    }
}
