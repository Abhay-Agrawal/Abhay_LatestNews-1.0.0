<?php

namespace Abhay\LatestNews\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    private $resultPageFactory;
    protected $helper;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Abhay\LatestNews\Helper\Data $helper
    ) {
        $this->helper = $helper;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        if (!$this->helper->getConfigValue('abhay/general/enable')) {
            return $resultPage;
        }
        return $resultPage;
    }
}
