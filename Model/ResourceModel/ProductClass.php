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

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ProductClass extends AbstractDb
{
    protected $_idFieldName = 'id';

    protected function _construct(): void
    {
        $this->_init('assemblyservice_product_class', 'id');
    }
}
