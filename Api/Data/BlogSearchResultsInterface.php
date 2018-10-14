<?php


namespace Experius\Blog\Api\Data;

interface BlogSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Blog list.
     * @return \Experius\Blog\Api\Data\BlogInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Experius\Blog\Api\Data\BlogInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
