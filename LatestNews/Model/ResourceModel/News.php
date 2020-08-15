<?php

namespace Abhay\LatestNews\Model\ResourceModel;

class News extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}

	protected function _construct()
	{
		$this->_init('latest_news', 'news_id');
	}

}
