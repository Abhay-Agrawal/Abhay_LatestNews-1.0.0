<?php

namespace Abhay\LatestNews\Block\Index;

use Magento\Framework\View\Element\Template\Context;

class Index extends \Magento\Framework\View\Element\Template
{

  protected $newsFactory;
  protected $date;

  public function __construct(
     \Magento\Framework\View\Element\Template\Context $context,
     \Abhay\LatestNews\Helper\Data $helperData,
     \Abhay\LatestNews\Model\ResourceModel\News\CollectionFactory $newsFactory,
     \Magento\Framework\Stdlib\DateTime\DateTime $date,
     \Magento\Cms\Model\Template\FilterProvider $filter,
     array $data = []
  ) {
     $this->helperData = $helperData;
     $this->newsFactory = $newsFactory;
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

  protected function _prepareLayout()
  {
     parent::_prepareLayout();
     if ($this->getnewsCollection()) {
         $pager = $this->getLayout()->createBlock(
            'Magento\Theme\Block\Html\Pager',
            'magecomp.category.pager'
         )->setAvailableLimit(array(5=>5,10=>10,15=>15))->setShowPerPage(true)->setCollection(
            $this->getnewsCollection()
         );
         $this->setChild('pager', $pager);
         $this->getnewsCollection()->load();
     }
     return $this;
  }

  public function getPagerHtml()
  {
      return $this->getChildHtml('pager');
  }

  public function getnewsCollection()
  {
    $page=($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
    $pageSize=($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 5;
    $date = $this->date->gmtDate();
    $currentDate = date("Y-m-d", strtotime($date));
    $newsCollection = $this->newsFactory->create();
    $newsCollection->addFieldToFilter('status', 1);
    $newsCollection->addFieldToFilter('start_date',['lteq' => $currentDate]);
    $newsCollection->addFieldToFilter('end_date',['gteq' => $currentDate]);
    // $newsCollection->addFilter('start_date', ['lteq' => $currentDate])
    //     ->addFilter('end_date', ['gteq' =>$currentDate]);
    $newsCollection->setPageSize($pageSize);
    $newsCollection->setCurPage($page);
    return $newsCollection;
  }



}
