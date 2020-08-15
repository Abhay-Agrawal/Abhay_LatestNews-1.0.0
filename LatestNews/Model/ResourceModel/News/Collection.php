<?php

namespace Abhay\LatestNews\Model\ResourceModel\News;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'news_id';
	protected $_eventPrefix = 'abhay_latestnews_news_collection';
	protected $_eventObject = 'news_collection';

	protected function _construct()
	{
		$this->_init('Abhay\LatestNews\Model\News', 'Abhay\LatestNews\Model\ResourceModel\News');
	}

}
