<?php declare(strict_types=1);
/**
 * @author     Osiozekhai Aliu
 * @package    BIWAC_ProductClassToPostcode
 * @copyright  Copyright (c) 2024 BIWAC
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BIWAC\ProductClassToPostcode\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface as ResultInterfaceAlias;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

Class Index extends Action {

    public function __construct(
        readonly private PageFactory $resultPageFactory,
        Context $context
    ) {
        parent::__construct($context);
    }

    public function execute(): Page|ResultInterfaceAlias|ResponseInterface
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__("Product Class Postcodes"));

        return $resultPage;
    }
}

