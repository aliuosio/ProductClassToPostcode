<?php declare(strict_types=1);
/**
 * @author     Osiozekhai Aliu
 * @package    Osio_AssemblyService
 * @copyright  Copyright (c) 2024 Osiozekhai Aliu (https://github.com/aliuosio)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BIWAC\ProductClassToPostcode\Controller\Adminhtml\Grid;


use BIWAC\ProductClassToPostcode\Model\ProductClassFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Save extends Action
{

    public function __construct(
        Context $context,
        private readonly ProductClassFactory $ProductClassFactory
    ) {
        parent::__construct($context);
    }

    public function execute(): void
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('postcode/grid/addrow');
            return;
        }
        try {
            $rowData = $this->ProductClassFactory->create();
            $rowData->setData($data);
            if (isset($data['entity_id'])) {
                $rowData->setEntityId($data['entity_id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('postcode/grid/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('BIWAC_ProductClassToPostcode::save');
    }
}
