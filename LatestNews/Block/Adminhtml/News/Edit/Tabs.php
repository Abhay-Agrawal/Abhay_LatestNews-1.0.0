<?php

namespace Abhay\LatestNews\Block\Adminhtml\News\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId('news_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Offer Information'));
    }
}
