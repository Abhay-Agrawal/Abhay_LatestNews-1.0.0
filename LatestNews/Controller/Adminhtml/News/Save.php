<?php
namespace Abhay\LatestNews\Controller\Adminhtml\News;

use Magento\Framework\Exception\LocalizedException;
use Abhay\LatestNews\Model\NewsFactory;

class Save extends \Magento\Backend\App\Action
{
    private $dataPersistor;
    private $newsModel;
    protected $newsFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Abhay\LatestNews\Model\News $newsModel,
        NewsFactory $newsFactory,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        \Magento\Framework\App\ResourceConnection $resourceConnection
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->newsModel = $newsModel;
        $this->newsFactory = $newsFactory;
        parent::__construct($context);
        $this->resourceConnection = $resourceConnection;
    }
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('news_id');
            $model = $this->newsModel->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This offer no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
            $model->setTitle($data['title']);
            $model->setStatus($data['status']);
            $model->setAuthorName($data['author_name']);
            $model->setContent($data['content']);
            $model->setStartDate($data['start_date']);
            $model->setEndDate($data['end_date']);


            $model->save();

          //  $model->setData($data);
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the offer.'));
                $this->dataPersistor->clear('abhay_latestnews');
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['news_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager
                    ->addExceptionMessage($e, __('Something went wrong while saving the offer.'));
            }
            $this->dataPersistor->set('abhay_latestnews', $data);
            return $resultRedirect->setPath(
                '*/*/edit',
                [
                    'news_id' => $this->getRequest()->getParam('news_id')
                ]
            );
        }
        return $resultRedirect->setPath('*/*/');
    }
}
