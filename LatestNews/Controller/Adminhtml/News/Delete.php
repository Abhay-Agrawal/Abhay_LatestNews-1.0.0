<?php

namespace Abhay\LatestNews\Controller\Adminhtml\News;

use Magento\Backend\App\Action;
use Magento\TestFramework\ErrorLog\Logger;

class Delete extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('news_id');
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->_objectManager->create('Abhay\LatestNews\Model\News');
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('The offer has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['news_id' => $id]);
            }
        }
        $this->messageManager->addError(__('We can\'t find a offer to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
