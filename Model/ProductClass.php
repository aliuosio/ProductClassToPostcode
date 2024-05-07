<?php declare(strict_types=1);
/**
 * @author     Osiozekhai Aliu
 * @package    BIWAC_ProductClassToPostcode
 * @copyright  Copyright (c) 2024 Osiozekhai Aliu (https://github.com/aliuosio)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace BIWAC\ProductClassToPostcode\Model;

use BIWAC\ProductClassToPostcode\Api\Data\ProductClassInterface;
use BIWAC\ProductClassToPostcode\Model\ResourceModel\ProductClass as ResourceProductClass;
use Magento\Framework\Model\AbstractModel;

class ProductClass extends AbstractModel implements ProductClassInterface
{

    const CACHE_TAG = 'assemblyservice_product_class';

    protected $_cacheTag = 'assemblyservice_product_class';

    protected $_eventPrefix = 'assemblyservice_product_class';

    protected function _construct(): void
    {
        $this->_init(ResourceProductClass::class);
    }

    public function getEntityId(): int
    {
        return $this->getData(self::ENTITY_ID);
    }

    public function setEntityId($entityId): ProductClass
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    public function getClassId(): int
    {
        return $this->getData(self::CLASS_ID);
    }

    public function setClassId(int $classId): ProductClass
    {
        return $this->setData(self::CLASS_ID, $classId);
    }

    public function getPostcode(): int
    {
        return $this->getData(self::POSTCODE);
    }

    public function setPostcode(int $postcode): ProductClass
    {
        return $this->setData(self::POSTCODE, $postcode);
    }

    public function getPrice(): float
    {
        return $this->getData(self::PRICE);
    }

    public function setPrice(float $price): ProductClass
    {
        return $this->setData(self::PRICE, $price);
    }
}
