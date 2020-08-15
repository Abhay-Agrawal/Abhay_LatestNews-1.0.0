<?php

namespace Abhay\LatestNews\Block\Adminhtml\News\Edit\Tab;

use Abhay\LatestNews\Model\Config\Source\NewsStatus;
use Magento\Cms\Model\Wysiwyg\Config;

class Main extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{

    protected $store;
    protected $newsStatus;
    public $wysiwygConfig;


    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        NewsStatus $newsStatus,
        Config $wysiwygConfig,
        array $data = []
    ) {
        $this->newsStatus = $newsStatus;
        $this->wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('abhay_latestnews');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('latest_');

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Offer Information')]);

        if ($model->getId()) {
            $fieldset->addField('news_id', 'hidden', ['name' => 'news_id']);
        }

        $fieldset->addField(
            'title',
            'text',
            [
                'name' => 'title',
                'label' => __('Title'),
                'title' => __('Title'),
                'after_element_html' => '<br/><small style="color:#0768fa;">Offer News display according to this title</small>',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'status',
            'select',
            [
                'name' => 'status',
                'label' => __('Status'),
                'after_element_html' => '<br/><small style="color:#0768fa;">Select Enable for show the news in frontend</small>',
                'values' => $this->newsStatus->toArray()
            ]
        );

        $fieldset->addField(
            'start_date',
            'date',
            [
                'name' => 'start_date',
                'label' => __('Offer Start Date'),
                'id' => 'start_date',
                'title' => __('offer Start Date'),
                'date_format' => 'yyyy-MM-dd',
                'time_format' => 'hh:mm:ss',
                'required' => true,
            ]
        );


        $fieldset->addField(
            'end_date',
            'date',
            [
                'name' => 'end_date',
                'label' => __('Offer End Date'),
                'id' => 'end_date',
                'title' => __('offer End Date'),
                'date_format' => 'yyyy-MM-dd',
                'time_format' => 'hh:mm:ss',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'author_name',
            'text',
            [
                'name' => 'author_name',
                'label' => __('Author Name'),
                'title' => __('Author Name'),
            ]
        );


        $fieldset->addField('content','editor', [
          'name' => 'content',
          'label' => __('Content'),
          'title' => __('Add News Content'),
          'config' => $this->wysiwygConfig->getConfig([
            'add_variables' => false,
            'add_widgets' => true,
            'add_directives'=> true
          ])
        ]);

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }


    public function getTabLabel()
    {
        return __('Main');
    }
    public function getTabTitle()
    {
        return __('Main');
    }
    public function canShowTab()
    {
        return true;
    }
    public function isHidden()
    {
        return false;
    }
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
