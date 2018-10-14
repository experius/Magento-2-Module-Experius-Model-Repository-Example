<?php


namespace Experius\Blog\Model;

use Magento\Framework\Api\DataObjectHelper;
use Experius\Blog\Api\Data\BlogInterface;
use Experius\Blog\Api\Data\BlogInterfaceFactory;

class Blog extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'experius_blog_blog';
    protected $blogDataFactory;

    protected $dataObjectHelper;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param BlogInterfaceFactory $blogDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        BlogInterfaceFactory $blogDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Experius\Blog\Model\ResourceModel\Blog $resource,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->blogDataFactory = $blogDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    public function getDataModel()
    {
        $blogData = $this->getData();
        
        $blogDataObject = $this->blogDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $blogDataObject,
            $blogData,
            BlogInterface::class
        );
        
        return $blogDataObject;
    }

}
