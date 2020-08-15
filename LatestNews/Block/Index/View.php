<?php
namespace Abhay\LatestNews\Block\Index;

use Abhay\LatestNews\Model\NewsFactory;

class View extends \Magento\Framework\View\Element\Template
{

  public function __construct(
     \Magento\Framework\View\Element\Template\Context $context,
     \Abhay\LatestNews\Helper\Data $helperData,
     \Abhay\LatestNews\Model\News $newsModel,
      NewsFactory $newsFactory,
     \Magento\Framework\Stdlib\DateTime\DateTime $date,
     \Magento\Cms\Model\Template\FilterProvider $filter,
     array $data = []
  ) {
     $this->helperData = $helperData;
     $this->newsFactory = $newsFactory;
     $this->newsModel = $newsModel;
     $this->date = $date;
     $this->filter = $filter;
     parent::__construct($context, $data);
  }

  public function getConfig()
  {
    return $this->helperData->getGeneralConfig('enable');
  }
  public function getcolor()
  {
    return $this->helperData->getGeneralConfig('text_color');
  }

  public function getContentFromStaticBlock($content)
  {
    return $this->filter->getBlockFilter()->filter($content);
  }

  public function getNewsCollection()
  {
    $newsCollection = $this->newsModel->create();
    return $newsCollection;
  }

  public function getNewsInformation($id)
  {
    $model = $this->newsModel;
    if ($id) {
      $model->load($id);
      $news = $this->newsFactory->create()->load($id);
    }
    return $news;
  }

}
