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
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;

class ProductClass extends AbstractModel implements ProductClassInterface
{

    const CACHE_TAG = 'assemblyservice_product_class';

    protected $_cacheTag = 'assemblyservice_product_class';

    protected $_eventPrefix = 'assemblyservice_product_class';

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

    protected function _construct(): void
    {
        $this->_init(ResourceProductClass::class);
    }

    public function getEntityId(): int
    {
        return (int)$this->getData(self::ENTITY_ID);
    }

    public function setEntityId($entityId): ProductClassInterface
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    public function getClassId(): int
    {
        return (int)$this->getData(self::CLASS_ID);
    }

    public function setClassId(int $classId): ProductClassInterface
    {
        return $this->setData(self::CLASS_ID, $classId);
    }

    public function getPostcode(): int
    {
        return (int)$this->getData(self::POSTCODE);
    }

    public function setPostcode(int $postcode): ProductClassInterface
    {
        return $this->setData(self::POSTCODE, $postcode);
    }

    public function getPrice(): float
    {
        return $this->getData(self::PRICE);
    }

    public function setPrice(float $price): ProductClassInterface
    {
        return $this->setData(self::PRICE, $price);
    }

    /**
     * @throws LocalizedException
     */
    public function getPostcodePrice(?string $postcode, ?string $classId): string
    {
        return $this->resourceProductClass->fetchPostcodePrice($postcode, $classId);
    }

}
