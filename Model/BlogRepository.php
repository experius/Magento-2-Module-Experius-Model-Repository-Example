<?php


namespace Experius\Blog\Model;

use Experius\Blog\Model\ResourceModel\Blog as ResourceBlog;
use Magento\Store\Model\StoreManagerInterface;
use Experius\Blog\Api\BlogRepositoryInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Experius\Blog\Model\ResourceModel\Blog\CollectionFactory as BlogCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Experius\Blog\Api\Data\BlogSearchResultsInterfaceFactory;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Exception\NoSuchEntityException;
use Experius\Blog\Api\Data\BlogInterfaceFactory;

class BlogRepository implements BlogRepositoryInterface
{

    protected $blogFactory;

    private $storeManager;

    protected $extensionAttributesJoinProcessor;

    protected $searchResultsFactory;

    private $collectionProcessor;
    protected $dataObjectProcessor;

    protected $blogCollectionFactory;

    protected $dataBlogFactory;

    protected $resource;

    protected $dataObjectHelper;


    /**
     * @param ResourceBlog $resource
     * @param BlogFactory $blogFactory
     * @param BlogInterfaceFactory $dataBlogFactory
     * @param BlogCollectionFactory $blogCollectionFactory
     * @param BlogSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     */
    public function __construct(
        ResourceBlog $resource,
        BlogFactory $blogFactory,
        BlogInterfaceFactory $dataBlogFactory,
        BlogCollectionFactory $blogCollectionFactory,
        BlogSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor
    ) {
        $this->resource = $resource;
        $this->blogFactory = $blogFactory;
        $this->blogCollectionFactory = $blogCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataBlogFactory = $dataBlogFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Experius\Blog\Api\Data\BlogInterface $blog
    ) {
        /* if (empty($blog->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $blog->setStoreId($storeId);
        } */
        try {
            $this->resource->save($blog);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the blog: %1',
                $exception->getMessage()
            ));
        }
        return $blog;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($blogId)
    {
        $blog = $this->blogFactory->create();
        $this->resource->load($blog, $blogId);
        if (!$blog->getId()) {
            throw new NoSuchEntityException(__('Blog with id "%1" does not exist.', $blogId));
        }
        return $blog;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->blogCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Experius\Blog\Api\Data\BlogInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Experius\Blog\Api\Data\BlogInterface $blog
    ) {
        try {
            $this->resource->delete($blog);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Blog: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($blogId)
    {
        return $this->delete($this->getById($blogId));
    }
}
