<?php

namespace Abhay\LatestNews\Model;

class News extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'abhay_latestnews_news';
	protected $_cacheTag = 'abhay_latestnews_news';
	protected $_eventPrefix = 'abhay_latestnews_news';

	protected function _construct()
	{
		$this->_init('Abhay\LatestNews\Model\ResourceModel\News');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}
	public function getDefaultValues()
	{
		$values = [];
		return $values;
	}
}
