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


class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \BIWAC\ProductClassToPostcode\Model\ProductClassFactory
     */
    var $ProductClassFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \BIWAC\ProductClassToPostcode\Model\ProductClassFactory $ProductClassFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \BIWAC\ProductClassToPostcode\Model\ProductClassFactory $ProductClassFactory
    ) {
        parent::__construct($context);
        $this->ProductClassFactory = $ProductClassFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('postcode/grid/addrow');
            return;
        }
        try {
            $rowData = $this->ProductClassFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
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
