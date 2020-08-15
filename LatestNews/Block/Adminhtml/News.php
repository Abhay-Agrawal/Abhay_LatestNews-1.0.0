<?php

namespace Abhay\LatestNews\Block\Adminhtml;

class Contact extends \Magento\Backend\Block\Widget\Grid\Container
{

    protected function _construct()
    {
        parent::__construct($context, $data);
    }
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
