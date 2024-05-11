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

class AddRow extends Action
{
    /**
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;

    /**
     * @var ProductClassFactory
     */
    private $ProductClassFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\Registry $coreRegistry,
        ProductClassFactory $ProductClassFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->ProductClassFactory = $ProductClassFactory;
    }

    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('entity_id');
        /** @var ProductClass $rowData */
        $rowData = $this->ProductClassFactory->create();
        /** @var Page $resultPage */
        if ($rowId) {
            $rowData = $rowData->load($rowId);
            $rowTitle = $rowData->getTitle();
            if (!$rowData->getEntityId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('postcode/grid/rowdata');
                return;
            }
        }

        $this->coreRegistry->register('row_data', $rowData);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit Row Data ').$rowTitle : __('Add Row Data');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }

}
