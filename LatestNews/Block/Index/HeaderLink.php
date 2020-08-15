<?php
namespace Abhay\LatestNews\Block\Index;

class HeaderLink extends \Magento\Framework\View\Element\Html\Link
{
    protected function _toHtml()
    {
        if (false != $this->getTemplate()) {
            return parent::_toHtml();
        }
        return '<li><a ' . $this->getLinkAttributes() . ' >' . $this->escapeHtml($this->getLabel()) . '</a></li>';
    }
}
