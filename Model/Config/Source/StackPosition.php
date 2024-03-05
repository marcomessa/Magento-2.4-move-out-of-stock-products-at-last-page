<?php
namespace Marcomessa\OutOfStockAtLast\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class StackPosition implements OptionSourceInterface
{
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'top', 'label' => __('Top')],
            ['value' => 'bottom', 'label' => __('Bottom')],
        ];
    }
}