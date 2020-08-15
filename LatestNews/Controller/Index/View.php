<?php

namespace Abhay\LatestNews\Controller\Index;

use Abhay\LatestNews\Model\NewsFactory;

class View extends \Magento\Framework\App\Action\Action
{
    private $resultPageFactory;
    protected $helper;
    protected $newsFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Abhay\LatestNews\Helper\Data $helper,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        NewsFactory $newsFactory,
        \Abhay\LatestNews\Model\News $newsModel
    ) {
        $this->helper = $helper;
        $this->resultPageFactory = $resultPageFactory;
        $this->newsFactory = $newsFactory;
        $this->newsModel = $newsModel;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $id = $this->getRequest()->getParam('id');
        $model = $this->newsModel;
        if ($id) {
            $model->load($id);
            $news = $this->newsFactory->create()->load($id);
        }
        $breadcrumbs = $resultPage->getLayout()->getBlock('breadcrumbs');
        $breadcrumbs->addCrumb(
            'home',
            [
                'label' => __('Home'),
                'title' => __('Home'),
                'link' => $this->_url->getUrl('')
            ]
        );
        $breadcrumbs->addCrumb(
            'offer',
            [
                'label' => __('All Offer'),
                'title' => __('All Offer'),
                'link' => $this->_url->getUrl('offer')
            ]
        );
        return $resultPage;
    }
}
