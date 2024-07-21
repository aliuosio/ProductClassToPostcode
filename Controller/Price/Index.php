<?php declare(strict_types=1);
/**
 * @author     Osiozekhai Aliu
 * @package    Osio_ProductClassToPostcode
 * @copyright  Copyright (c) 2024 Osiozekhai Aliu (https://github.com/aliuosio)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Osio\ProductClassToPostcode\Controller\Price;

use Osio\ProductClassToPostcode\Model\ProductClassFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Exception\LocalizedException;

class Index implements ActionInterface
{
    public function __construct(
        readonly private JsonFactory         $resultJsonFactory,
        readonly private ProductClassFactory $productClassFactory,
        readonly private Http                $request
    ) {}


    /**
     * @throws LocalizedException
     */
    public function execute(): Json
    {
        $result = $this->resultJsonFactory->create();
        $productClass = $this->productClassFactory->create();

        $price = $productClass->getPostcodePrice(
            $this->request->getParam('postcode'),
            $this->request->getParam('class_id')
        );

        return $result->setData([
            'success' => true,
            'price' => $price
        ]);
    }
}
