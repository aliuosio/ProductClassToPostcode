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

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Controller\ResultFactory;
use BIWAC\ProductClassToPostcode\Model\ProductClassFactory;
use BIWAC\ProductClassToPostcode\Model\ProductClass;
use Magento\Framework\Registry;

class AddRow extends Action
{

    public function __construct(
        Context $context,
        private readonly Registry $coreRegistry,
        private readonly ProductClassFactory $ProductClassFactory
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('entity_id');
        $rowData = $this->ProductClassFactory->create();
        if ($rowId) {
            $rowData = $rowData->load($rowId);
            if (!$rowData->getData('entity_id')) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('postcode/grid/index');
                return;
            }
        }

        $this->coreRegistry->register('row_data', $rowData);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __("Product Class: {$rowData->getClassId()} Postcode: {$rowData->getPostcode()}") : __('Add Row Data');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }

}
