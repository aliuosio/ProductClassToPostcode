<?php declare(strict_types=1);
/**
 * @author     Osiozekhai Aliu
 * @package    BIWAC_ProductClassToPostcode
 * @copyright  Copyright (c) 2024 Osiozekhai Aliu (https://github.com/aliuosio)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BIWAC\ProductClassToPostcode\Controller\Price;

use BIWAC\ProductClassToPostcode\Model\ResourceModel\ProductClass\CollectionFactory as ProductClassCollectionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;

class Index implements ActionInterface
{
    public function __construct(
        readonly private JsonFactory $resultJsonFactory,
        readonly private ProductClassCollectionFactory $productClassCollectionFactory,
        readonly private Http $request
    ) {}

    public function execute(): Json
    {
        $result = $this->resultJsonFactory->create();
        return $result->setData([
            'success' => true,
            'price' => $this->getPostcodePrice(
                $this->request->getParam('postcode'),
                $this->request->getParam('class_id')
            )
        ]);
    }

    protected function getPostcodePrice(string $postcode, string $classId): mixed
    {
        $price = 0;

        $collection = $this->productClassCollectionFactory->create();
        $collection->addFieldToFilter('class_id', ['eq' => $classId])
            ->addFieldToFilter('postcode', ['eq' => $postcode])
            ->setPageSize(1);

        if ($collection->getSize() > 0) {
            $price = $collection->getFirstItem()->getPrice();
        }

        return $price;
    }
}
