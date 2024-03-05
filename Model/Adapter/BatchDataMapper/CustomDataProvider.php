<?php namespace Marcomessa\OutOfStockAtLast\Model\Adapter\BatchDataMapper;

use Magento\AdvancedSearch\Model\Adapter\DataMapper\AdditionalFieldsProviderInterface;

class CustomDataProvider implements AdditionalFieldsProviderInterface
{
    protected \Magento\CatalogInventory\Model\StockRegistry $stockItemRepository;

    public function __construct(
        \Magento\CatalogInventory\Model\StockRegistry $stockItemRepository
    ) {
        $this->stockItemRepository = $stockItemRepository;
    }

    /**
     * @inheritdoc
     */
    public function getFields(array $productIds, $storeId)
    {
        $fields = [];

        foreach ($productIds as $productId) {
            $stockItem = $this->stockItemRepository->getStockItem($productId);
            $isInStock = $stockItem ? $stockItem->getIsInStock() : false;

            $b = $isInStock ? 1 : 0;

            $data = $b; //you can get your data here
            $fields[$productId] = ['quantity_and_stock_status' => $data];
        }

        return $fields;
    }
}