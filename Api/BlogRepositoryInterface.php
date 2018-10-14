<?php


namespace Experius\Blog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface BlogRepositoryInterface
{

    /**
     * Save Blog
     * @param \Experius\Blog\Api\Data\BlogInterface $blog
     * @return \Experius\Blog\Api\Data\BlogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Experius\Blog\Api\Data\BlogInterface $blog
    );

    /**
     * Retrieve Blog
     * @param string $blogId
     * @return \Experius\Blog\Api\Data\BlogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($blogId);

    /**
     * Retrieve Blog matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Experius\Blog\Api\Data\BlogSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Blog
     * @param \Experius\Blog\Api\Data\BlogInterface $blog
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Experius\Blog\Api\Data\BlogInterface $blog
    );

    /**
     * Delete Blog by ID
     * @param string $blogId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($blogId);
}
