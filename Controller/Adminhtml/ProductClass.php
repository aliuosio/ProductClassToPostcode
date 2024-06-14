<?php
/**
 * Copyright © Copyright (c) 2024 BIWAC All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BIWAC\ProductClassToPostcode\Controller\Adminhtml;

abstract class ProductClass extends \Magento\Backend\App\Action
{

    protected $_coreRegistry;
    const ADMIN_RESOURCE = 'BIWAC_ProductClassToPostcode::top_level';

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
            ->addBreadcrumb(__('BIWAC'), __('BIWAC'))
            ->addBreadcrumb(__('Productclass'), __('Productclass'));
        return $resultPage;
    }
}

