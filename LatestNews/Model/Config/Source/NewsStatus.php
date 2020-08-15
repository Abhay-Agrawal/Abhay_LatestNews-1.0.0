<?php

namespace Abhay\LatestNews\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class NewsStatus implements ArrayInterface
{

    const DISABLE     = '0';
    const ENABLE    = '1';

    public function toOptionArray()
    {
        $options = [];
        foreach ($this->toArray() as $value => $label) {
            $options[] = [
                'value' => $value,
                'label' => $label
            ];
        }
        return $options;
    }

    public function toArray()
    {
        return [
            self::ENABLE     => __('Enable'),
            self::DISABLE    => __('Disable')
        ];
    }
}
