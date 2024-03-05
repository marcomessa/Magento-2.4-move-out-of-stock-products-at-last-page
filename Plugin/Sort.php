<?php

namespace Marcomessa\OutOfStockAtLast\Plugin;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Sort
{
    protected ScopeConfigInterface $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function afterGetSort(
        \Magento\Elasticsearch\SearchAdapter\Query\Builder\Sort $subject,
                                                                $sorts
    )
    {
        $isEnabled = $this->scopeConfig->getValue(
            'outofstockatlast/general/enable',
            ScopeInterface::SCOPE_WEBSITE
        );

        $stackPosition = $this->scopeConfig->getValue(
            'outofstockatlast/general/stack_position',
            ScopeInterface::SCOPE_WEBSITE
        );

        if ($isEnabled) {
            if (!$stackPosition || $stackPosition === 'top') {
                array_unshift($sorts, [
                    'quantity_and_stock_status' => [
                        'order' => 'desc'
                    ]
                ]);
            } else {
                $sorts[] = [
                    'quantity_and_stock_status' => [
                        'order' => 'asc'
                    ]
                ];
            }
        }

        return $sorts;
    }
}
