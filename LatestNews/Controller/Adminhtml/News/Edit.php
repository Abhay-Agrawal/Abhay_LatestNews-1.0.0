<?php

namespace Abhay\LatestNews\Controller\Adminhtml\News;

use Magento\Backend\App\Action;

class Edit extends \Magento\Backend\App\Action
{
    protected $_coreRegistry = null;
    protected $resultPageFactory;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }
    protected function _initAction()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
    public function execute()
    {
        $id = $this->getRequest()->getParam('news_id');
        $model = $this->_objectManager->create('Abhay\LatestNews\Model\News');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This offer no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('abhay_latestnews', $model);
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Offer') : __('New Offer'),
            $id ? __('Edit Offer') : __('New Offer')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Offer'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getTitle() : __('New Offer'));

        return $resultPage;
    }
}
