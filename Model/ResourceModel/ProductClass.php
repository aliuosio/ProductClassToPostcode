<?php declare(strict_types=1);
/**
 * @author     Osiozekhai Aliu
 * @package    BIWAC_ProductClassToPostcode
 * @copyright  Copyright (c) 2024 Osiozekhai Aliu (https://github.com/aliuosio)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace BIWAC\ProductClassToPostcode\Model\ResourceModel;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ProductClass extends AbstractDb
{
    protected $_idFieldName = 'entity_id';

    protected function _construct(): void
    {
        $this->_init('assemblyservice_product_class', 'entity_id');
    }

    /**
     * @throws LocalizedException
     */
    public function fetchPostcodePrice(string $postcode, string $classId): string
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
