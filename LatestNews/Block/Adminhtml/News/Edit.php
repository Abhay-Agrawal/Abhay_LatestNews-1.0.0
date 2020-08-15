<?php

namespace Abhay\LatestNews\Block\Adminhtml\News;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    protected $_coreRegistry = null;

    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    protected function _construct()
    {
        $this->_objectId = 'news_id';
        $this->_blockGroup = 'Abhay_LatestNews';
        $this->_controller = 'adminhtml_news';

        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save offer'));
        $this->buttonList->add(
            'saveandcontinue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                    ],
                ]
            ],
            -100
        );

        $this->buttonList->update('delete', 'label', __('Delete offer'));
    }

    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('latestnews/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '']);
    }

}
