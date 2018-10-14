<?php


namespace Experius\Blog\Model\ResourceModel\Blog;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Experius\Blog\Model\Blog::class,
            \Experius\Blog\Model\ResourceModel\Blog::class
        );
    }
}
